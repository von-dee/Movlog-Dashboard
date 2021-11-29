<script>
    $(document).ready(function() {

        if ($("#div_print")) {
            $("#div_print").click(function() {
                // window.print_out.print();

                var mywindow = window.open('', 'PRINT', 'height=768,width=1024');
                var elem = "print_area";

                mywindow.document.write('<html><head><link href="media/css/bootstrap.css" rel="stylesheet"><link href="public/thirdpartyded/scripts/print.css" rel="stylesheet">');
                mywindow.document.write('</head><body >');
                mywindow.document.write(document.getElementById(elem).innerHTML);
                mywindow.document.write('</body></html>');

                mywindow.document.close(); // necessary for IE >= 10
                mywindow.focus(); // necessary for IE >= 10*/

                mywindow.print();

                return true;
            });
        }

    });
</script>