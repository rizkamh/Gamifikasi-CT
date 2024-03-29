$(document).ready(function(){
    kdmk = $('#kodemkses').val();
    tampilmateridisfil(kdmk);
    $("tbody#tbldis").on("click","#rubah",function(){
        mode = "Upload";
        var id = $(this).data("id");
        var a="dosen/rubahdis?idmateri=";
        var loc = a.concat(id); 
        // alert(loc);        
        window.location.href = loc;
    });

    $("tbody").on("click","#hapus",function(){
        var id = $(this).data("id");
        // alert(id);
        hapusmateri(id);
    });

    $("#simpan").click(function(){
        simpanmateri();
    });

    $("tbody").on("click","#reset",function(){
        var id = $(this).data("id");
        resetUser(id);
    });
})

function showMessage(mode){
    var divMessage = "<div class='alert alert-success'>" +
                            "Berhasil <strong>" + mode.toUpperCase() + "</strong> materi" +
                        "</div>";
    $(divMessage)
        .prependTo(".ini")
        .delay(2000)
        .slideUp("slow");
}

function simpanmateri(){
    $.ajax({
        url: "dosen/rubahdis/simpandis",
        type: "POST",
        data: $("#dis").serialize(),
        dataType: "JSON",
        success: function(data){
            if(data.status){
                console.log("teredit");
            }else{
                console.log("tdk teredit");
            }
        }
    })
}

function hapusmateri(id){
    if(confirm("Anda yakin hapus ?")){
        $.ajax({
            url: "dosen/lihatdis/hapus/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                if(data.status){
                    tampilmateridisfil(kdmk);
                    showMessage('delete');
                }
            }
        });
    }
}

function bacamateri(id){
    $("form")[0].reset();
    $.ajax({
        url: "dosen/lihatup/baca/"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data){
            $("#idmateri").val(data.idmateri);
            $("#matakuliah").val(data.matakuliah);
            $("#judulmateri").val(data.judulmateri);
            $("#tanggal").val(data.tanggal);
            // $("#upload").val(data.file);
            $("#upload").change(function() {
                var filename = $("#upload").val();
                $("#upload").html(filename);
            });
        
            $("#mode").html("Upload");
            $("#form-rubah").modal("show");
        }
    })
}

function tampilmateridisfil(kdmk){
    $.ajax({
        type: "get",
        url: "dosen/lihatdis/datadisfil/"+kdmk,
        dataType: "JSON",
        success: function(data){
            var html = "";
            for(i=0;i < data.length;i++){
                html += "<tr>" +
                            "<td>"+ data[i].idmateri +"</td>"+
                            "<td>"+ data[i].pertemuan +"</td>"+
                            "<td>"+ data[i].semester +"</td>"+
                            "<td>"+ konversiJurusan(data[i].prodi) +"</td>"+
							"<td>"+ data[i].matakuliah +"</td>"+
							"<td>"+ data[i].judulmateri +"</td>"+
                            "<td>"+ data[i].tanggal +"</td>"+                       		
							"<td style='width:85px;'><button id='rubah' class='btn btn-info btn-block' data-id='" + data[i].idmateri + "'>"+
									"<span class='icon-eye-open'></span> Rubah</button>"+
                            "</td>"+
							"<td style='width:90px;'><button class='btn btn-danger btn-block' id='hapus' data-id='" + data[i].idmateri + "'>"+
									"<span class='icon-trash'></span> Hapus</button>"+
                            "</td>"+
                            
						"</tr>";
            }
            $("tbody#tbldis").html(html);
        }
    })
}

function tampilmateridis(){
    $.ajax({
        type: "get",
        url: "dosen/lihatdis/datadis",
        dataType: "JSON",
        success: function(data){
            var html = "";
            for(i=0;i < data.length;i++){
                html += "<tr>" +
                            "<td>"+ data[i].idmateri +"</td>"+
                            "<td>"+ data[i].pertemuan +"</td>"+
                            "<td>"+ data[i].semester +"</td>"+
                            "<td>"+ konversiJurusan(data[i].prodi) +"</td>"+
							"<td>"+ data[i].matakuliah +"</td>"+
							"<td>"+ data[i].judulmateri +"</td>"+
                            "<td>"+ data[i].tanggal +"</td>"+                       		
							"<td style='width:85px;'><button id='rubah' class='btn btn-info btn-block' data-id='" + data[i].idmateri + "'>"+
									"<span class='icon-eye-open'></span> Rubah</button>"+
                            "</td>"+
							"<td style='width:90px;'><button class='btn btn-danger btn-block' id='hapus' data-id='" + data[i].idmateri + "'>"+
									"<span class='icon-trash'></span> Hapus</button>"+
                            "</td>"+
                            
						"</tr>";
            }
            $("tbody#tbldis").html(html);
        }
    })
}