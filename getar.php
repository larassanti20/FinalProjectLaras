<!DOCTYPE html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<title>SISTEM MONITORING PENDETEKSI KERUSAKAN SEPEDA MOTOR</title>
    <meta http-equiv="refresh" content="600">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <style>
        #dt-suhu {
            font-size: 14px !important;
        }
       
    </style>
</head>

<body>
<div class="container-fluid">
    <br>
    <br>
    <p id="judul"><i class="fa fa-droplet"></i> Data Getar</p>
    <table id="dt-suhu" class="table table-striped table-hover" style="width:100%">
        <thead>
            <tr>
                <th class="dt-center">No</th>
                <th class="dt-center">Nilai Getar</th>
                <th class="dt-center">Kondisi Mesin</th>
                <th class="dt-center">Tanggal & Waktu</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        
    </table>
</div>

<script>
    $(document).ready(function() {
        selesai();
    });

    function selesai() {
        setTimeout(function() {
            update();
            selesai();
        }, 500);
    }

    function update() {
        $.getJSON("api/getar.php", function(data) {
            $("tbody").empty();
            var no = 1; 
            $.each(data.data, function() {
                $("tbody").append("<tr><td>"+(no++)+"</td><td>"+this['nilai_getar']+"</td><td>"+this['kondisi_mesin']+"</td>"+"<td>"+this['time_update']+"</td></tr>");
            });
        });
    } 
</script>

</html>