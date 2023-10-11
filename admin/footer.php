<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>

<script type="text/javascript">
    var checkAll = document.querySelector('#checkAll')
    var checkBoxes = document.querySelectorAll('.checkbox')
    var chon = document.querySelector('.chon')
    var bochon = document.querySelector('.bochon')

    checkAll.onclick = () => {
        checkBoxes.forEach(checkBox => {
            if (checkAll.checked == true) {
                checkBox.checked = true
                chon.style.display = 'none'
                bochon.style.display = 'block'
            } else {
                checkBox.checked = false;
                chon.style.display = 'block'
                bochon.style.display = 'none'
            }
        });



    }
</script>

<script>
    $(window).on('load', function () {
        $(".loader").fadeOut(1000);
        $(".content").fadeIn(1000);
    });
</script>

</body>

</html>