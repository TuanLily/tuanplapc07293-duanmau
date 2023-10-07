<style>
#myChart {
    width: 1000px;
    height: 800px;
    padding-top: 200px;
    margin-right: 200px;
}
</style>

<div id="myChart">
</div>

<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
google.charts.load('current', {
    'packages': ['corechart']
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

    // Set Data
    const data = google.visualization.arrayToDataTable([
        ['Danh Mục Sản Phẩm', 'Số lượng Sản Phẩm'],
        <?php
        $tongdm = count($listthongke);
        $i=0;
            foreach ($listthongke as $thongke) {
                extract($thongke);
                if($i==$tongdm) {
                    $dauphay = "";
                }else{
                    $dauphay = ",";
                    echo "['".$thongke['tendm']."', ".$thongke['countsp']."]".$dauphay;
                }
                
                $i+=1;
            }
        ?>
    ]);

    // Set Options
    const options = {
        title: 'Thống kê sản phẩm theo danh mục',

    };

    // Draw
    const chart = new google.visualization.PieChart(document.getElementById('myChart'));
    chart.draw(data, options);

}
</script>