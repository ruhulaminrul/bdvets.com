  $(document).ready(function(){

    $(document).on('click', "#medichine-edit-item", function() {



        $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

        var options = {
          'backdrop': 'static'
        };
        $('#medichine-edit-modal').modal(options)
      });

      // on modal show
      $('#medichine-edit-modal').on('show.bs.modal', function() {
        var el = $(".edit-item-trigger-clicked"); // See how its usefull right here?
        var row = el.closest(".data-row");

        // get the data
        var id = el.data('item-id');
        var name = row.children(".name").text();
          var description = row.children(".description").text();
          var medichineCategoryName = row.children(".medichineCategory").text();


        var action= $("#indexLink").val()+'/medichines/'+id;
        $("#medichine-edit-form").attr('action',action);

        // fill the data in the input fields
        $("#medichine-modal-input-id").val(id);
        $("#medichine-modal-input-name").val(name);
        $("#medichine-modal-input-description").val(description);


          var catagoryhtml = '';

          $.get($("#medichine_category_list_api").val().trim(), function (medichineCategories, status) {


              medichineCategories.forEach(function (medichineCategory, item) {
                  //   alert(viewCategoryId+'   '+i.name);
                  if (medichineCategoryName == medichineCategory.name) {
                      catagoryhtml += '   <option  selected="selected"  value="  ' + medichineCategory.id + ' ">  ' + medichineCategory.name + '    </option>';
                  } else {
                      catagoryhtml += '   <option value="  ' + medichineCategory.id + ' "> ' + medichineCategory.name + '</option>';
                  }

              });


              $("#medichine-modal-input-catagory_id").html(catagoryhtml);
          });



      });

      // on modal hide
      $('#medichine-edit-modal').on('hide.bs.modal', function() {
        $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
        $("#medichine-edit-form").trigger("reset");
      });

  }) ;
