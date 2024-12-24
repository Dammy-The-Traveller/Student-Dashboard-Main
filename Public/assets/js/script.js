
//This holds Course Selection
$(document).ready(function(){
  //script to open camera dialog

 var href = $(location).attr('href');  
 var index = href.lastIndexOf("/");
 var controller = href.substring(index+1);
  
  loadData($("#idStud").val());

      $("#status_photo").click(function(){
          //$('.show_photoload').hide();
          $('#upload_certificate_bling').css("opacity","1");
          $("#get_photo").attr('src','');
          $("#upload_guy").click();
      });
      
      $("#upload_guy").change(function(event){
          $("#get_photo").show();
          $('#meeky').show();
          $("#get_photo").attr("src",URL.createObjectURL(event.target.files[0]));
      }); 

      $('#remove_photo_up').click(function(){
              $('.show_photoload').fadeIn('slow');
              $("#get_photo").attr('src','');
              $('#meeky').fadeOut();
      });



      $('body').delegate("#upload_certificate","click",function(bigg){
        bigg.preventDefault();
          var oleku = $("#upload_guy").val();
           if(oleku!="")
           {
            $('#breakups').submit();
           }
      })

      $("body").delegate("#breakups","submit",function(yeak){
      yeak.preventDefault();
      $.ajax(
      {
        url: "catalog/controller/certificate.php",
        type: "POST",
        data:new FormData(this),
                cache:false,
                contentType:false,
                processData:false,

        beforeSend:function()
        {
         $('#upload_certificate').attr("disabled","disabled");
         $('#upload_certificate').css("opacity",".5");
          $("#ait_loader_meek").fadeIn();

        },
        success:function(datas)
        {

          if(datas==0)
          {
            $('#upload_certificate').removeAttr("disabled");
          $('#upload_certificate').css("opacity","1");
          $("#ait_loader_meek").fadeOut();
            $('#error_guy_here_upd').fadeIn().html("File Type Should Be .Docx or .Pdf or .Rtf Or .Doc Or  .Jpeg Or .Png");
               setTimeout(function(){

                 $('#error_guy_here_upd').fadeOut();
               },6000)
          }
          else if(datas==1)
          {
             
          $('#upload_certificate').css("opacity",".5");
          $("#ait_loader_meek").fadeOut();
            $('#succ_guy_here_upd').fadeIn().html("Certificate Uploaded Successfully! (Page We be refresh in the next 6seconds)");
               setTimeout(function(){
                location.reload();
                 $('#succ_guy_here_upd').fadeOut();
               },6000)
          }
          else
          {
            $("#ait_loader_meek").fadeOut();
            $('#upload_certificate').removeAttr("disabled");
          $('#upload_certificate').css("opacity","1");
            $('#error_guy_here_upd').fadeIn().html("An error occured while uploading your file, Please try again");
               setTimeout(function(){

                 $('#error_guy_here_upd').fadeOut();
               },6000)
          }
        }

      });
    })
     
     $(document).on("click", "#uploadFile", function(){
        window.location.href="stage3.php";
     });

      $('body').delegate("#upload_certificate_bling","click",function(bigg){
        bigg.preventDefault();
       
          var oleku = $("#upload_guy").val();
           if(oleku!="")
           {
            $('#breakups_bling').submit();
           }
      });

      $("body").delegate("#breakups_bling","submit",function(yeak){
      yeak.preventDefault();

      $.ajax(
      {
        url: "catalog/controller/certificate_ext.php",
        type: "POST",
        data:new FormData(this),
                cache:false,
                contentType:false,
                processData:false,

        beforeSend:function()
        {

         //$('#upload_certificate_bling').attr("disabled","disabled");
          $('#upload_certificate_bling').css("opacity",".5");
          $("#ait_loader_meek").fadeIn();

        },
        success:function(datas)
        {
          //alert(datas);
            //console.log(datas);
          if(datas==0)
          {
            $('#upload_certificate_bling').removeAttr("disabled");
            $('#upload_certificate_bling').css("opacity","1");
          //$("#ait_loader_meek").fadeOut();
            $('#error_guy_here_upd').fadeIn().html("File Type Should Be .Docx or .Pdf or .Rtf Or .Doc Or  .Jpeg Or .Png");
               setTimeout(function(){

                 $('#error_guy_here_upd').fadeOut();
               },6000)
          }
          else if(datas==1)
          {




           var result = confirm("Your File has been Uploaded Successfully. Click OK to upload another file or Click Cancel to continue")

           if(result){
            $('#meeky').fadeOut();
            $("#ait_loader_meek").fadeOut();
            $('#succ_guy_here_upd').fadeIn().html("Your File has been Uploaded Successfully!");
            //alert("Your File has been Uploaded Successfully!");
            $('#uploadFile').removeAttr('disabled');
            $('#beeferd').hide();
            $('#msg').hide();
             $("#status_photo").click();
           }else{
            $('#upload_certificate_bling').css("opacity",".5");
            $('#upload_certificate_bling').fadeOut();
            $('#meeky').fadeOut();
            $("#ait_loader_meek").fadeOut();
            $('#succ_guy_here_upd').fadeIn().html("Your File has been Uploaded Successfully!");
            $('#uploadFile').removeAttr('disabled');
            $('#beeferd').hide();
            $('#msg').hide();
           }

            
            setTimeout(function(){
              $('#succ_guy_here_upd').fadeOut();
              $('#upload_certificate_bling').fadeIn();
            }, 3000);
          }
          else
          {
            $("#ait_loader_meek").fadeOut();
            $('#upload_certificate_bling').removeAttr("disabled");
          $('#upload_certificate_bling').css("opacity","1");
            $('#error_guy_here_upd').fadeIn().html("An error occured while uploading your file, Please try again");
               setTimeout(function(){

                 $('#error_guy_here_upd').fadeOut();
               },6000)
          }
        }

      });
    })
      $('.progress-in').stop().animate({ width: $('.progress-val').text()},
    { duration: 2000, step: function (now) {
         $('.progress-val').text(Math.ceil(now) + '%');
    }
});




      $('body').delegate("#send_me_guy","click",function(yig){
        yig.preventDefault();
        var bigger = $('#manour').val();
        if(bigger!="")
        {
          $.ajax({
              url: "catalog/controller/loader.php",
        type: "POST",
        data:{"bigger":bigger},

        beforeSend:function()
        {
         $('#send_me_guy').attr("disabled","disabled");
         $('#send_me_guy').css("opacity",".5");
          $("#load_tag").fadeIn();
          $('#sender_tag').fadeIn().html("Sending Message");

        },
        success:function(datas)
        {
          //alert(datas);
          /*if(datas==1)
          {
             $('#send_me_guy').removeAttr("disabled");
         $('#send_me_guy').css("opacity","1");
         $("#load_tag").fadeOut();
          $('#sender_tag').fadeIn().html("Send Message");
          $('#load_succ').fadeIn().html("Your Message have been sent successfully");
          $('#activatik').trigger("reset");
           setTimeout(function(){
            $('#load_succ').fadeOut(400).html("");
          },5000)
          }
          else
          {
             $('#send_me_guy').removeAttr("disabled");
         $('#send_me_guy').css("opacity","1");
         $("#load_tag").fadeOut();
          $('#sender_tag').fadeIn().html("Send Message");
           $('#load_err').fadeIn(400).html("An error Occured Please try again");
          setTimeout(function(){
            $('#load_err').fadeOut(400).html("");
          },5000)
          }*/
          
        }
          })
        }
        else
        {

          $('#load_err').fadeIn(400).html("Message Field Cannot be empty");
          setTimeout(function(){
            $('#load_err').fadeOut(400).html("");
          },5000)
        }
      })


      var selected="";

      $('body').delegate("#update_basic_data","click",function(rf){
        rf.preventDefault();

        var dataValid = true;
        
       $('.meq').each(function()
       {
        var cur = $(this);
       
       if ($.trim(cur.val()) == '')
       {  
   
        $('#error_guy_here').fadeIn().html("All fields are required");
        cur.css("border","1px solid red");
       setTimeout(function(){

         $('#error_guy_here').fadeOut();
         cur.css("border","1px solid #ccc");
       },6000)
       dataValid = false;
       }
       });
        if(dataValid)
       {
        
        $("#update_form_1").submit();

       }
      })

      $("body").delegate("#update_form_1","submit",function(yeak){
      yeak.preventDefault();
      $.ajax(
      {
        url: "catalog/controller/update.php",
        type: "POST",
        data:new FormData(this),
                cache:false,
                contentType:false,
                processData:false,

        beforeSend:function()
        {
          $('#update_basic_data').attr("disabled","disabled");
          $('#update_basic_data').css("opacity",".5");
          $("#ait_loader_yes").fadeIn();

        },
        success:function(datas)
        {
          if(datas==0)
          {
            $('#update_basic_data').removeAttr("disabled");
          $('#update_basic_data').css("opacity","1");
          $("#ait_loader_yes").fadeOut();
            $('#error_guy_here').fadeIn().html("No Basic Information Was Modified");
               setTimeout(function(){

                 $('#error_guy_here').fadeOut();
               },6000)
          }
          else if(datas==1)
          {
             $('#update_basic_data').removeAttr("disabled");
          $('#update_basic_data').css("opacity","1");
          $("#ait_loader_yes").fadeOut();
            $('#succ_guy_here').fadeIn().html("Your Basic Information have been successfully Updated!");
               setTimeout(function(){

                 $('#succ_guy_here').fadeOut();
               },6000)
          }
          else
          {
            $("#ait_loader_yes").fadeOut();
            $('#update_basic_data').removeAttr("disabled");
          $('#update_basic_data').css("opacity","1");
            $('#error_guy_here').fadeIn().html("An error occured, Please try again");
               setTimeout(function(){

                 $('#error_guy_here').fadeOut();
               },6000)
          }
        }

      });
    })



      $('body').delegate("#remove_cert","click",function(){
         var keep = $(this).data("id");
         
           if(confirm("Are you sure you want to remove this Certificate ?"))
            {
              $(this).parent().css("opacity",".3");
               $.ajax({
                 url: "catalog/controller/removal.php",
               type:"POST",
               data:{"triggering":keep},
               beforeSend:function()
               {
                $('#display_shad').show();
               },
               success:function(xends)
               {
                 if(xends>0)
                 {
                 $(this).parent().css("display","none");
                 $(this).parent().remove();
                 
                 alert("Certificate Deleted Succesfully")
                   $('#display_shad').hide();
                 }
                 else
                 {
                    alert("An error occured, Please try again");
                    $('#display_shad').hide();
                 }
               }

    })
            }
            else
            {
              return false;
            }
      })

  function change_subject_grades(){
    var t=$("#changeress").val();
    var url_string = window.location.href
    var url = new URL(url_string);
    var c = url.searchParams.get("off");
    //alert(c);
    
    if(t=="NECO"){
      $("#courseArea").css('display','inline');
      $("#infoArea").css('display','inline');
      $('.show_neco_subjects').show();
      $('.show_Neco_grades').show();
      $('.show_ssce_grades').hide();
      $('.show_wassce_subjects').hide();
      $('.show_wassce_grades').hide();
      $('.show_Baccalaureat_grades').hide();
      $('.show_Baccalaureat_subjects').hide();
      // $("#1").val("");
      // $("#2").val("");
      // $("#3").val("");
      // $("#4").val("");
    }
    else if(t=="SSCE"){
      $("#courseArea").css('display','inline');
      $("#infoArea").css('display','inline');
      $('.show_neco_subjects').hide();
         $('.show_Neco_grades').hide();
      $('.show_wassce_grades').hide();
      $('.show_ssce_grades').show();
      $('.show_wassce_subjects').show();
      $('.show_Baccalaureat_grades').hide();
      $('.show_Baccalaureat_subjects').hide();
    }
    else if(t=="Baccalaureat"){
      $("#courseArea").css('display','inline');
      $("#infoArea").css('display','inline');
      $('.show_neco_subjects').hide();
      $('.show_Neco_grades').hide();
      $('.show_wassce_grades').hide();
      $('.show_ssce_grades').hide();
      $('.show_wassce_subjects').hide();
      $('.show_Baccalaureat_subjects').show();
      $('.show_Baccalaureat_grades').show();
    } else if(t=="WASSCE"){
      $("#courseArea").css('display','inline');
      $("#infoArea").css('display','inline');
      $('.show_neco_subjects').hide();
      $('.show_Neco_grades').hide();
      $('.show_wassce_grades').show();
      $('.show_ssce_grades').hide();
      $('.show_Baccalaureat_subjects').hide();
      $('.show_Baccalaureat_grades').hide();
      $('.show_wassce_subjects').show();

      //$("#1").prepend(new Option("English Language", "value"));
     
      // $("#1").val("english");
      // $("#2").val("maths");
      // $("#3").val("science");
      // $("#4").val("social");



      //$("#optiondisp").css('display', 'inline')

      //var text1 = 'English Language';
      /*$("#1 option").each(function() {
        if($(this).text() == text1) {
          alert("here dd");
          $(this).val(text1);
          $(this).text(text1);
          alert($(this).html());

          //$(this).prop('selected', true);
          //$(this).attr('selected', 'selected');            
        }  
                             
      });*/
      

   

    }//add 2021
    else if(t == "HND" || t == "Diploma"){
      $("#courseArea").css('display','none');      
      $("#infoArea").css('display','none');
    }
    $('#cert').html(t);
    //$('.subject_list').val("");
    $('.grade_list').val("");
    $('.grade_list_first').text("");
    $('.subject_list_first').text("");
    if(c == "true"){
      $(".grade_list").val('NoGrade');
    }
  }

  $("body").delegate("#changeress","change",function(){
    change_subject_grades()
  })


    // $("#changeress").val("WASSCE");

setTimeout(function () {
  if($("#changeress").val()=="WASSCE"||$("#changeress").val()=="SSCE"){
      $("#1").val("English language");
      $("#2").val("Mathematics(Core)");
      $("#3").val("Integrated Science");
      $("#4").val("Social Studies");
  }else if ($("#changeress").val()=="NECO") {
      $("#1").val("English language");
      $("#2").val("Mathematics(Core)");
      $("#3").val(null);
      $("#4").val(null);
  } else {
      $("#1").val(null);
      $("#2").val(null);
      $("#3").val(null);
      $("#4").val(null);
  }                 
}, 500);

$("#changeress").change(function(){
  if($("#changeress").val()=="WASSCE"||$("#changeress").val()=="SSCE"){
      $("#1").val("English language");
      $("#2").val("Mathematics(Core)");
      $("#3").val("Integrated Science");
      $("#4").val("Social Studies");
      $("#grd").html("Select Your Grades");
      for (var i=1;i<=8;i++) {
        if ($("select[name='grade"+i+"']").is('select')) {
          
        } else {
          location.reload();
        }
      }
  }else if ($("#changeress").val()=="NECO") {
      $("#1").val("English language");
      $("#2").val("Mathematics(Core)");
      $("#3").val(null);
      $("#4").val(null);
      $("#grd").html("Select Your Grades");
      for (var i=1;i<=8;i++) {
        if ($("select[name='grade"+i+"']").is('select')) {
          
        } else {
          location.reload();
        }
      }
  } else if ($("#changeress").val() == "Baccalaureat") {
      $("#1").val(null);
      $("#2").val(null);
      $("#3").val(null);
      $("#4").val(null);
      $("#grd").html("Enter Your Notes/Scores (eg 75)");
      for (var i=1;i<=9;i++) {
        $("select[name='grade"+i+"']").replaceWith('<input type="text" name="grade'+i+'" id="'+i+'" class="form-control grade_list">');
      }
  }
});

$("select[name='course1'],select[name='course2'],select[name='course3'],select[name='course4'],select[name='course5'],select[name='course6'],select[name='course7'],select[name='course8']").change(function(){
  if ($(this).val() == "Others") {
    $("select[name='"+$(this).attr("name")+"']").replaceWith('<input type="text" name="'+$(this).attr("name")+'" id="'+$(this).attr("id")+'" style="width:278px" class="form-control grade_list">');
  }
});
  // $(".subject_list").change(
  //     function(e){
  //       var selected =  $(this).map(function(){ return this.value }).get();

  //       console.log("Selected Id: "+$(this).attr('id'))
  //       var id = $(this).attr('id');

  //       $(".subject_list").each(function( index ) {
  //         console.log( selected + ": " + $( this ).val() );
          

  //         //alert(id+"/"+parseInt(index+1));

  //         if (id !=  parseInt(index+1)) {
  //           if (selected.includes($(this).val())) {
  //             alert(selected + " Is Already Selected");
  //             $("#"+id).val("");
  //           } 
  //         }
          
  //       });

  //       // var t=$(this).val();
  //       // if(selected.indexOf(t) > -1){
  //       //   $(this).val("");
  //       //   alert(t + " Is Already Selected");
  //       // }
  //       // else{
  //       //   selected += t + ",";
  //       // }
  //     }
  //   );


    $("#submitButton").click(function(){
     // if($("#checkPhoto").val() !== "1"){
      //  alert("Please upload your passport photo")
     // }else{
        updateBasicInfo();
     // }
      
    });





    function updateBasicInfo() {
      var fd = new FormData();
      fd.append("first_name", $("input[name='upfname']").val());
      fd.append("middle_name", $("input[name='upmname']").val());
      fd.append("last_name", $("input[name='uplname']").val());
      fd.append("email", $("input[name='upemail']").val());
      fd.append("contact", $("input[name='upphone1']").val());
      fd.append("contact2", $("input[name='upphone2']").val());
      fd.append("gender", $("#upgender").val());
      fd.append("dob", $("input[name='updob']").val());
      fd.append("whatsapp", $("input[name='upwhatsapp']").val());
      fd.append("address", $("input[name='upaddress']").val());
      fd.append("nationality", $("select[name='uporigin']").val());
 

      $.ajax({
          url:"./catalog/controller/updateInfo.php",
          type:"POST",
          data: fd,
          contentType: false,       
          cache: false, 
          processData:false,
          success:function(data)
          {
            if(controller.includes('final_review')){
              window.location.href="stage3.php";
            }else{
              window.location.href="full_update.php";
            }
           },
          error:function(err) 
          {
            //alert(err.responseText);
          }
    });


    }


  //   $("select").change(function(e){
  //   var selected =  $(this).map(function(){ return this.value }).get();
  //   var name = $(this).attr('name');
  //   var objvalue = $(this).val();
  //   var id = $("#idStud").val().trim();


  //   saveObject(name, objvalue, id);

  // });

  $("select").change(function(e){
    var selected =  $(this).map(function(){ return this.value }).get();
    var name = $(this).attr('name');
    var objvalue = $(this).val();
    var id = $("#idStud").val().trim();
    if(name == 'first_choice' && (objvalue.includes('PhD') || objvalue.includes('masters'))){
      $('#second_choice').val(objvalue);
      $('#third_choice').val(objvalue);
    }

    saveObject(name, objvalue, id);

  });

  $(".subject_list").change(
      function(e){
        var selected =  $(this).map(function(){ return this.value }).get();

        //saveObject("course"+$(this).attr('id'), )
        console.log("Selected Id: "+$(this).attr('id'))
        var id = $(this).attr('id');

        $(".subject_list").each(function( index ) {
          console.log( selected + ": " + $( this ).val() );
          

          //alert(id+"/"+parseInt(index+1));

          if (id !=  parseInt(index+1)) {
            if (selected.includes($(this).val())) {
              alert(selected + " Is Already Selected");
              $("#"+id).val("");
            } 
          }
          
        });

        // var t=$(this).val();
        // if(selected.indexOf(t) > -1){
        //   $(this).val("");
        //   alert(t + " Is Already Selected");
        // }
        // else{
        //   selected += t + ",";
        // }
      }
    );

  function saveObject(objname, objvalue, id) {

    var fd = new FormData();
    fd.append("objname", objname);
    fd.append("objvalue", objvalue);
    fd.append("email", id);

      $.ajax({
          url: "catalog/controller/subject_tmp_save.php",
          type:"POST",
          data: fd,
          contentType: false,       
          cache: false, 
          processData:false,
          success:function(xends)
          {
            //alert(xends);
          },
          error: function(err) {
            //alert(err.responseText);
          }
      });
  }

  function loadData(id) {
    var fd = new FormData();
        fd.append("id", id);
        fd.append("retrieve", "retrieve");
        
        if ($("#changeress").val() == "WASSCE" || $("#changeress").val() == "SSCE") {
            $("#1").val("English language");
            $("#2").val("Mathematics(Core)");
            $("#3").val("Integrated Science");
            $("#4").val("Social Studies");
        } else if ($("#changeress").val() == "NECO") {
            $("#1").val("English language");
            $("#2").val("Mathematics(Core)");
            $("#3").val("");
            $("#4").val("");
        }
        var url_string = window.location.href
        var url = new URL(url_string);
        var c = url.searchParams.get("off");
        $.ajax({
            url:"catalog/controller/subject_tmp_save.php",
            type:"POST",
            data: fd,
            contentType: false,       
            cache: false, 
            dataType:"JSON",
            processData:false,
            success:function(data)
            {  
                //alert(JSON.stringify(data));
                //console.log(data);
                
              for (var i=0;i<data.length;i++) {
                
                // if(data[i]["objvalue"] !== "SSCE"||data[i]["objvalue"] !== "WASSCE"){
                //         $("#1").val("English language");
                //         $("#2").val("Mathematics(Core)");
                //         $("#3").val("Integrated Science");
                //         $("#4").val("Social Studies");
                // }else{
                //         // $("#1").val("");
                //         // $("#2").val("");
                //         // $("#3").val("");
                //         // $("#4").val("");
                // }
                
                //console.log(c);
                if(c !== "true"){
                  $("select[name='"+data[i]["objname"]+"']").val(data[i]["objvalue"]);
                }else{
                  if(data[i]["objname"].includes("grade") !== true){
                    $("select[name='"+data[i]["objname"]+"']").val(data[i]["objvalue"]);
                  }
                }
              }
               if($("#changeress option:selected").text().includes("Diploma") || $("#changeress option:selected").text().includes("HND")){
                   $("#courseArea").css('display','none');      
                   $("#infoArea").css('display','none');
               }
            },
            error: function(err) {
               //alert("In error: "+err.responseText);
            }
        });
  }


    $("#submitCourese").click(function(){
      insert_course();
    });



  //Update Admission Courses
    function insert_course() {
      var fd = new FormData();

      var url_string = window.location.href
      var url = new URL(url_string);
      var c = url.searchParams.get("off");

      if(($("select[name='first_choice']").val().includes('Master')&&$("select[name='second_choice']").val().includes('Master')&&$("select[name='third_choice']").val().includes('Master')) 
      ||($("select[name='first_choice']").val().includes('PhD')&&$("select[name='second_choice']").val().includes('PhD')&&$("select[name='third_choice']").val().includes('PhD')) || $("#changeress").val().includes('Diploma') || $("#changeress").val().includes('HND')){
      fd.append("school_cert", $("select[name='school_cert']").val());
      fd.append("first_choice", $("select[name='first_choice']").val());
      fd.append("second_choice", $("select[name='second_choice']").val());
      fd.append("third_choice", $("select[name='third_choice']").val());
      fd.append("course1", "N/A");
      fd.append("course2", "N/A");
      fd.append("course3", "N/A");
      fd.append("course4", "N/A");
      fd.append("course5", "N/A");
      fd.append("course6", "N/A");
      fd.append("course7", "N/A");
      fd.append("course8", "N/A");
      fd.append("course9", "N/A");
      fd.append("grade1", "N/A");
      fd.append("grade2", "N/A");
      fd.append("grade3", "N/A");
      fd.append("grade4", "N/A");
      fd.append("grade5", "N/A");
      fd.append("grade6", "N/A");
      fd.append("grade7", "N/A");
      fd.append("grade8", "N/A");
      fd.append("grade9", "N/A");   
     
        $.ajax({
          url:"./catalog/controller/insertCourses.php",
          type:"POST",
          data: fd,
          contentType: false,       
          cache: false, 
          processData:false,
          beforeSend:function()
          {
            $("#submitCourese").prop("disabled", true);
            $("#submitCourese > i").addClass("fa fa-spinner fa-spin");
            $("#submitCourese").css("cursor", "no-drop");
          },
          success:function(data)
          {
            //joey add
            
             if(controller.includes('final_review')){
              window.location.href="stage3.php";
            }else{
              //alert(c);
              //alert('A message has been sent to your email. Please access it and act accordingly. Thanks');
              if(c=="true"){
                window.location.href="stage2.php?off=true";
              }else{
                window.location.href="stage2.php";
              }
            }
          },
          error:function(err) 
          {

          }
    });

          
          
//}else if((!$("select[name='first_choice']").val().includes('Master')&&!$("select[name='second_choice']").val().includes('Master')&&!$("select[name='third_choice']").val().includes('Master'))||(!$("select[name='first_choice']").val().includes('PhD')&&!$("select[name='second_choice']").val().includes('PhD')&&!$("select[name='third_choice']").val().includes('PhD'))){
}else if((!$("select[name='first_choice']").val().includes('PhD')&&!$("select[name='second_choice']").val().includes('PhD')&&!$("select[name='third_choice']").val().includes('PhD'))){

      

     if($("select[name='first_choice']").val().length == 0){
         alert("Please Select First Choice");
     }else if($("select[name='second_choice']").val().length == 0){
         alert("Please Select Second Choice");
     }else if($("select[name='third_choice']").val().length == 0){
         alert("Please Select Third Choice");
     }

     if ($("select[name='grade1']").is("select")) {
      if($("select[name='course1']").val().length >0 && $("select[name='grade1']").val().length == 0){
         alert("Please Select a Grade for "+$("select[name='course1']").val());
      }else if($("select[name='course2']").val().length >0 && $("select[name='grade2']").val().length == 0){
         alert("Please Select a Grade for "+$("select[name='course2']").val());
      }else if($("select[name='course3']").val().length >0 && $("select[name='grade3']").val().length == 0){
         alert("Please Select a Grade for "+$("select[name='course3']").val());
      }else if($("select[name='course4']").val().length >0 && $("select[name='grade4']").val().length == 0){
         alert("Please Select a Grade for "+$("select[name='course4']").val());
      }else if($("select[name='course5']").val().length >0 && $("select[name='grade5']").val().length == 0){
         alert("Please Select a Grade for "+$("select[name='course5']").val());
      }else if($("select[name='course6']").val().length >0 && $("select[name='grade6']").val().length == 0){
         alert("Please Select a Grade for "+$("select[name='course6']").val());
      }else if($("select[name='course7']").val().length >0 && $("select[name='grade7']").val().length == 0){
         alert("Please Select a Grade for "+$("select[name='course7']").val());
      }else if($("select[name='course8']").val().length >0 && $("select[name='grade8']").val().length == 0){
         alert("Please Select a Grade for "+$("select[name='course8']").val());
      } else {
        for (var i=1;i<=8;i++) {
        var course = "select[name='course"+i+"'] option:selected";
        var grade = "select[name='grade"+i+"'] option:selected";
        if ($(course).text() == "" || $(grade).text() == "") {
          alert("You have left out some required fields, please kindly fill them");
          return;
        } 
      }
      
      fd.append("school_cert", $("select[name='school_cert']").val());
      fd.append("first_choice", $("select[name='first_choice']").val());
      fd.append("second_choice", $("select[name='second_choice']").val());
      fd.append("third_choice", $("select[name='third_choice']").val());
      fd.append("course1", $("select[name='course1']").val());
      fd.append("course2", $("select[name='course2']").val());
      fd.append("course3", $("select[name='course3']").val());
      fd.append("course4", $("select[name='course4']").val());
      fd.append("course5", $("select[name='course5']").val());
      fd.append("course6", $("select[name='course6']").val());
      fd.append("course7", $("select[name='course7']").val());
      fd.append("course8", $("select[name='course8']").val());
      fd.append("course9", $("select[name='course9']").val());
      fd.append("grade1", $("select[name='grade1']").val());
      fd.append("grade2", $("select[name='grade2']").val());
      fd.append("grade3", $("select[name='grade3']").val());
      fd.append("grade4", $("select[name='grade4']").val());
      fd.append("grade5", $("select[name='grade5']").val());
      fd.append("grade6", $("select[name='grade6']").val());
      fd.append("grade7", $("select[name='grade7']").val());
      fd.append("grade8", $("select[name='grade8']").val());
      fd.append("grade9", $("select[name='grade9']").val());   
     
        $.ajax({
          url:"./catalog/controller/insertCourses.php",
          type:"POST",
          data: fd,
          contentType: false,       
          cache: false, 
          processData:false,
          beforeSend:function()
          {
            $("#submitCourese").prop("disabled", true);
            $("#submitCourese > i").addClass("fa fa-spinner fa-spin");
            $("#submitCourese").css("cursor", "no-drop");
          },
          success:function(data)
          {
             if(controller.includes('final_review')){
              window.location.href="stage3.php";
            }else{
             // alert('A message has been sent to your email. Please access it and act accordingly. Thanks');
              if(c == "true"){
                //sessionStorage.setItem("awaitingResult", "True");

                window.location.href="stage2.php?off=true";
              }else{

                window.location.href="stage2.php";  
              }
              
            }
          },
          error:function(err) 
          {

          }
        }); 
      } 
     } else if ($("input[name='grade1']").is("input")) {
      
      //Baccalaureat applicants submission
      if($("#1").val().length >0 && $("input[name='grade1']").val().length == 0){
         alert("Please Enter a Note for "+$("#1").val());
      }else if($("#2").val().length >0 && $("input[name='grade2']").val().length == 0){
         alert("Please Enter a Note for "+$("#2").val());
      }else if($("#3").val().length >0 && $("input[name='grade3']").val().length == 0){
         alert("Please Enter a Note for "+$("#3").val());
      }else if($("#4").val().length >0 && $("input[name='grade4']").val().length == 0){
         alert("Please Enter a Note for "+$("#4").val());
      }else if($("#5").val().length >0 && $("input[name='grade5']").val().length == 0){
         alert("Please Enter a Note for "+$("#5").val());
      }else if($("#6").val().length >0 && $("input[name='grade6']").val().length == 0){
         alert("Please Enter a Note for "+$("#6").val());
      }else if($("#7").val().length >0 && $("input[name='grade7']").val().length == 0){
         alert("Please Enter a Note for "+$("#7").val());
      }else if($("#8").val().length >0 && $("input[name='grade8']").val().length == 0){
         alert("Please Enter a Note for "+$("#8").val());
      } else {
        for (var i=1;i<=8;i++) {
        //var course = "#"+i+" option:selected";
        var grade = "input[name='grade"+i+"']";
        if ($(grade).val() == "") {
          alert("You have left out some required fields, please kindly fill them");
          return;
        } 
      }
      
      fd.append("school_cert", $("select[name='school_cert']").val());
      fd.append("first_choice", $("select[name='first_choice']").val());
      fd.append("second_choice", $("select[name='second_choice']").val());
      fd.append("third_choice", $("select[name='third_choice']").val());
      fd.append("course1", $("#1").val());
      fd.append("course2", $("#2").val());
      fd.append("course3", $("#3").val());
      fd.append("course4", $("#4").val());
      fd.append("course5", $("#5").val());
      fd.append("course6", $("#6").val());
      fd.append("course7", $("#7").val());
      fd.append("course8", $("#8").val());
      fd.append("course9", $("#9").val());
      fd.append("grade1", $("input[name='grade1']").val());
      fd.append("grade2", $("input[name='grade2']").val());
      fd.append("grade3", $("input[name='grade3']").val());
      fd.append("grade4", $("input[name='grade4']").val());
      fd.append("grade5", $("input[name='grade5']").val());
      fd.append("grade6", $("input[name='grade6']").val());
      fd.append("grade7", $("input[name='grade7']").val());
      fd.append("grade8", $("input[name='grade8']").val());
      fd.append("grade9", $("input[name='grade9']").val());   
     
        $.ajax({
          url:"./catalog/controller/insertCourses.php",
          type:"POST",
          data: fd,
          contentType: false,       
          cache: false, 
          processData:false,
          beforeSend:function()
          {
            $("#submitCourese").prop("disabled", true);
            $("#submitCourese > i").addClass("fa fa-spinner fa-spin");
            $("#submitCourese").css("cursor", "no-drop");
          },
          success:function(data)
          {
             if(controller.includes('final_review')){
              window.location.href="stage3.php";
            }else{
             // alert('A message has been sent to your email. Please access it and act accordingly. Thanks');
              if(c == "true"){
                //sessionStorage.setItem("awaitingResult", "True");

                window.location.href="stage2.php?off=true";
              }else{

                window.location.href="stage2.php";  
              }
              
            }
          },
          error:function(err) 
          {

          }
        }); 
      } 
     } 
    }
    }


    var file_name, file_id;
   
    $(document).on("click", ".btnreplace", function(){
      file_name = $(this).attr("name");
      file_id = $(this).attr("id");



       $("#idfile").click();
      
    });



     $("#idfile").change(function(){
      var newfile = $('#idfile')[0].files[0];   
      replaceFile(newfile)
    });


      function replaceFile(newfile) {
      var fd = new FormData();
        fd.append("oldFile", file_name);
        fd.append("file", newfile)
        fd.append("id", file_id);
        $.ajax({
            url:"catalog/controller/replaceUploadedFile.php",
            type:"POST",
            data: fd,
            contentType: false,       
            cache: false, 
            //dataType:"JSON",
            processData:false,
            success:function(data)
            {  
              if(data === '1'){
                location.reload();
              }else{
                alert("File Replacement failed. Please try again")
              }
            },
            error: function(err) {
                //alert("In error: "+err.responseText);
            }
        });
    }





    $(document).on("click", ".btndelete", function(){
      var name = $(this).attr("name");
      var id = $(this).attr("id");

      deleteFile(name, id);
    });

    function deleteFile(name, id) {
      var fd = new FormData();
        fd.append("name", name);
        fd.append("id", id);

        $.ajax({
            url:"catalog/controller/deleteUploadedFile.php",
            type:"POST",
            data: fd,
            contentType: false,       
            cache: false, 
            //dataType:"JSON",
            processData:false,
            success:function(data)
            {  
              // alert(JSON.stringify(data)+"/"+data[0]["objname"]);
              location.reload();
            },
            error: function(err) {
                //alert("In error: "+err.responseText);
            }
        });
    }



    $("#uploadfile").click(function(){
            $("#file").click();
    });



    $("#updatefile").click(function(){
        $("#file").click();
    });

    $("#file").change(function(){        
        $("#basic_rev").submit();
    });



      $("body").delegate("#basic_rev","submit",function(yeak){
      yeak.preventDefault();

      $.ajax(
      {
        url: "catalog/controller/img_upload.php",
        type: "POST",
        data:new FormData(this),
                cache:false,
                contentType:false,
                processData:false,

        beforeSend:function()
        {
         //$('#upload_certificate_bling').attr("disabled","disabled");
          $('#upload_certificate_bling').css("opacity",".5");
          $("#ait_loader_meek").fadeIn();

        },
        success:function(datas)
        {
        
          if(datas > 0){
            location.reload()
          }
                  // alert("Result: "+datas)
          // if(datas==0)
          // {
          //   $('#upload_certificate_bling').removeAttr("disabled");
          //   $('#upload_certificate_bling').css("opacity","1");
          // //$("#ait_loader_meek").fadeOut();
          //   $('#error_guy_here_upd').fadeIn().html("File Type Should Be .Docx or .Pdf or .Rtf Or .Doc Or  .Jpeg Or .Png");
          //      setTimeout(function(){

          //        $('#error_guy_here_upd').fadeOut();
          //      },6000)
          // }
          // else if(datas==1)
          // {
          //   $('#upload_certificate_bling').css("opacity",".5");
          //   $('#upload_certificate_bling').fadeOut();
          //   $('#meeky').fadeOut();
          //   $("#ait_loader_meek").fadeOut();
          //   $('#succ_guy_here_upd').fadeIn().html("Your File has been Uploaded Successfully!");
          //   alert("Your File has been Uploaded Successfully!");
          //   $('#uploadFile').removeAttr('disabled');
          //   $('#beeferd').hide();
          //   $('#msg').hide();
             
          //   setTimeout(function(){
          //     $('#succ_guy_here_upd').fadeOut();
          //     $('#upload_certificate_bling').fadeIn();
          //   }, 3000);
          // }
          // else
          // {
          //   $("#ait_loader_meek").fadeOut();
          //   $('#upload_certificate_bling').removeAttr("disabled");
          // $('#upload_certificate_bling').css("opacity","1");
          //   $('#error_guy_here_upd').fadeIn().html("An error occured while uploading your file, Please try again");
          //      setTimeout(function(){

          //        $('#error_guy_here_upd').fadeOut();
          //      },6000)
          // }
        }

      });
    })












//     function uploadData(){
//       $.ajax(
//       {
//         url: "catalog/controller/img_upload.php",
//         type: "POST",
//         // data:new FormData(this),
//                 cache:false,
//                 contentType:false,
//                 processData:false,

//         beforeSend:function()
//         {
//          $('#uploadfile').attr("disabled","disabled");
//          $('#uploadfile').css("opacity",".5");
//           // $("#ait_loader_meek").fadeIn();

//         },
//         success:function(datas)
//         {

//           alert("Result: "+datas)

//           // if(datas==0)
//           // {
//           //   $('#upload_certificate').removeAttr("disabled");
//           // $('#upload_certificate').css("opacity","1");
//           // $("#ait_loader_meek").fadeOut();
//           //   $('#error_guy_here_upd').fadeIn().html("File Type Should Be .Docx or .Pdf or .Rtf Or .Doc Or  .Jpeg Or .Png");
//           //      setTimeout(function(){

//           //        $('#error_guy_here_upd').fadeOut();
//           //      },6000)
//           // }
//           // else if(datas==1)
//           // {
             
//           // $('#upload_certificate').css("opacity",".5");
//           // $("#ait_loader_meek").fadeOut();
//           //   $('#succ_guy_here_upd').fadeIn().html("Certificate Uploaded Successfully! (Page We be refresh in the next 6seconds)");
//           //      setTimeout(function(){
//           //       location.reload();
//           //        $('#succ_guy_here_upd').fadeOut();
//           //      },6000)
//           // }
//           // else
//           // {
//           //   $("#ait_loader_meek").fadeOut();
//           //   $('#upload_certificate').removeAttr("disabled");
//           // $('#upload_certificate').css("opacity","1");
//           //   $('#error_guy_here_upd').fadeIn().html("An error occured while uploading your file, Please try again");
//           //      setTimeout(function(){

//           //        $('#error_guy_here_upd').fadeOut();
//           //      },6000)
//           // }
//         },
//             error: function(err) {
//           alert("In error: "+err.responseText);
//         }

//       });
// }

// Added thumbnail
function addThumbnail(data){
    $("#uploadfile h1").remove(); 
    var len = $("#uploadfile div.thumbnail").length;

    var num = Number(len);
    num = num + 1;

    var name = data.name;
    var size = convertSize(data.size);
    var src = data.src;

    // Creating an thumbnail
    $("#uploadfile").append('<div id="thumbnail_'+num+'" class="thumbnail"></div>');
    $("#thumbnail_"+num).append('<img src="'+src+'" width="100%" height="78%">');
    $("#thumbnail_"+num).append('<span class="size">'+size+'<span>');

}




})