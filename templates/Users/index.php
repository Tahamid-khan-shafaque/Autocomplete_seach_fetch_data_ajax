<div class="row">
    <div class="col-6">

        <?php 

        echo $this->Form->control('search',['label' => 'Enter User id','type'=>'int','id'=>'search','class' => 'form-control']);
        echo $this->Form->button('Fetch all', ['type' => 'button','id'=>'btnfetchall']);
        echo $this->Form->button('Search', ['type' => 'button','id'=>'btnsearch','style'=>'margin-left: 15px;']);

        ?>

      
        <table id="usersTable">
            <thead>
                 <tr>
                     <th>ID</th>
                     <th>Username</th>
                     <th>Name</th>
                     <th>Gender</th>
                     <th>Email</th>
                     <th>City</th>
                 </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div>

</div>


<script type="text/javascript">


var csrfToken = $('meta[name="csrfToken"]').attr('content');

jQuery(document).ready(function(){

   
     $('#btnfetchall').click(function(){

  
           $.ajax({
                url: "<?= $this->Url->build(['controller' => 'Users','action' => 'fetchAllUsers']) ?>",
                type: "get",
                dataType: 'json',
                success: function(response){
                 
                     createTableRows(response);
                }
           });
     });

     
     $('#btnsearch').click(function(){
           var userid = $('#search').val();

         
           $.ajax({
               url: "<?= $this->Url->build(['controller' => 'Users','action' => 'fetchUserById']) ?>",
               type: "post",
               data: {userid: userid},
               dataType: 'json',
               headers:{
                    'X-CSRF-Token': csrfToken
               },
               success: function(response){
           
                    createTableRows(response);

               }
           });
     });

});


function createTableRows(response){
     var len = 0;
     $('#usersTable tbody').empty(); 
     if(response != null){
          len = response.length;
     }

     if(len > 0){
          for(var i=0; i<len; i++){
               var id = response[i].id;
               var username = response[i].username;
               var name = response[i].name;
               var gender = response[i].gender;
               var email = response[i].email;
               var city = response[i].city;

               var tr_str = "<tr>" +
                   "<td align='center'>" + id + "</td>" +
                   "<td align='center'>" + username + "</td>" +
                   "<td align='center'>" + name + "</td>" +
                   "<td align='center'>" + gender + "</td>" +
                   "<td align='center'>" + email + "</td>" +
                   "<td align='center'>" + city + "</td>" +
               "</tr>";

               $("#usersTable tbody").append(tr_str);
          }
     }else{
          var tr_str = "<tr>" +
              "<td align='center' colspan='4'>No record found.</td>" +
          "</tr>";

          $("#usersTable tbody").append(tr_str);
     }
} 
</script>