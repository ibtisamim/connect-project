<script>
  $(document).ready(function(){
    $(".itemSearch").on('input',function(){
      $('.input_category_check:not(:checked)').closest('.col-lg-4').remove();
      var $search = $(this).val();
      if($search.length < 2){
        return false;
      }
      $.ajax({
        url: '{{route('filter_subcategory')}}',
        data: {
          search: $search
        },
        dataType: 'json',
        beforeSend: function(){
          // Remove all not selected tags

        },
        success: function(res){
        //  console.log(res);
          var content = '';
          for(var $i = 0 ; $i < res.length ; $i++){
            console.log($('data-' + res[$i].id).length);
            if($('#data-' + res[$i].id).length == 0){
              content += `<div class="col-lg-4">
                            <label class="subcategory_label_check" for="data-${res[$i].id}">
                                <input type="checkbox" id="data-${res[$i].id}" value='${res[$i].id}'" name="subcategory[]" class="input_category_check">
                                <div class="style_subcategory_box">${res[$i].title}</div>
                            </label>
                         </div>`;
            }


          }
          $('.type').append(content);
        //  console.log(content);
        },
        error: function(error){
          console.log(error)
        }
      });
    });
  });
</script>
