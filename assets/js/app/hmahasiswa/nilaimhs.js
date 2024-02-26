$(document).ready(function () {
    $("#tampilnilai").css("display", "none");
    tampilsoal()
    $("#quiz").click(function () {
        event.preventDefault();
        $("#tampilnilai").css("display", "block");
        $("#tampilawal").css("display", "none");
        html = "";
        $("tbody#tbltampilnilai").html(html);
        tipesoal = 'quiz';
        tampilnilai(tipesoal);
    });
    $("#tugas").click(function () {
        event.preventDefault();
        $("#tampilnilai").css("display", "block");
        $("#tampilawal").css("display", "none");
        html = "";
        $("tbody#tbltampilnilai").html(html);
        tipesoal = 'tugas';
        tampilnilai(tipesoal);
    });
    $("#uts").click(function () {
        event.preventDefault();
        $("#tampilnilai").css("display", "block");
        $("#tampilawal").css("display", "none");
        html = "";
        $("tbody#tbltampilnilai").html(html);
        tipesoal = 'uts';
        tampilnilai(tipesoal);
    });
    $("#kelompok").click(function () {
        event.preventDefault();
        $("#tampilnilai").css("display", "block");
        $("#tampilawal").css("display", "none");
        html = "";
        $("tbody#tbltampilnilai").html(html);
        tipesoal = 'kelompok';
        tampilnilai(tipesoal);
    });
    $("#kembali").click(function () {
        $("#tampilnilai").css("display", "none");
        $("#tampilawal").css("display", "block");
    });

    $("#cetak").click(function () {
        $("#tipetugas").val(tipesoal)
        laporannilai();
    });

    // $("#cetak").click(function(){
    //     nama = $("#nama").val();
    //     nim = $("#nim").val();
    //     var htmlcetak = "<h3>Riwayat Quiz "+nama+" - "+nim+"</h3>";
    //     $(".headcetak").prepend(htmlcetak);
    //     demoFromHTML();
    //     alert("Berhasil dicetak!");
    //     location.reload();
    // });
});

function laporannilai() {
    $.ajax({
        type: "POST",
        url: 'hmahasiswa/nilaimhs/laporan',
        data: "form1",
        success: function (status) {
            var a = "hmahasiswa/nilaimhs/laporan?tipetugas=" + tipesoal;
            // alert(loc);        
            window.open(a);
        }
    });
}

function tampilnilai(tipesoal) {
    $.ajax({
        url: "hmahasiswa/nilaimhs/ambildata/" + tipesoal,
        type: "POST",
        dataType: "JSON",
        success: function (data) {
            var html = "";
            if (data.length != 0) {
                for (i = 0; i < data.length; i++) {
                    var timer = data[i].timer.split(":")
                    var minutes = parseInt(30 - timer[0]) - 1
                    var second = parseInt(60 - timer[1])
                    minutes = minutes.toString().length === 1 ? '0' + minutes : minutes
                    second = second.toString().length === 1 ? '0' + second : second
                    var times = minutes + ':' + second
                    //  console.log(second.toString().length)
                    html += "<tr>" +
                        "<td class='taskStatus'>" + data[i].tanggal_nilai + "</td>" +
                        "<td class='taskStatus'>" + times + "</td>" +
                        "<td class='taskStatus'> Quiz " + (i + 1) + " </td>" +
                        "<td class='taskDesc'> Tipe Soal " + konversiTipesoal(data[i].tipesoal) + "</td>" +
                        "<td class='taskStatus'>" + data[i].nilai + "</td>" +
                        "</tr>";
                }
                $("tbody#tbltampilnilai").html(html);
            } else if (data.length == 0) {
                alert("Belum memiliki nilai " + tipesoal);
            }
        }
    })
}

function tampilsoal() {
    $.ajax({
        url: "hmahasiswa/nilaimhs/ambilriwayat",
        type: "POST",
        dataType: "JSON",
        success: function (data) {
            var html = "";
            for (i = 0; i < data.length; i++) {
                html += "<tr>" +
                    "<td class='taskDesc'><i class='icon-info-sign alert-success'></i> Quiz " + (i + 1) + " </td>" +
                    "<td class='taskDesc'><i class='icon-info-sign'></i> Tipe Soal : " + konversiTipesoal(data[i].tipesoal) + "</td>" +
                    "<td class='taskStatus'>" + data[i].tanggal_nilai + "</td>" +
                    "" + Statustampil(data[i].status) + "" +
                    "</td>" +
                    "</tr>";
            }
            $("tbody#tblriwayat").html(html);
        }
    })
}