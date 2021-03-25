<?php include_once('header.php'); ?>
<div id="container">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.js"></script>

	 <div class="container">
    <div class="row">
      <div class="col-sm-12 ">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Students List</h5>

    

                <?php if ($this->session->flashdata('msg')) { ?><?php echo $this->session->flashdata('msg'); } ?>

	<table id="example1" class="display" style="width:100%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Student Name</th>
                <th>Mark 1</th>
                <th>Mark 2</th>
                <th>Mark 3</th>
                <th>Total</th>
                <th>Rank</th>
                <th>Result</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="tbody_div">

            <?php if($students) { foreach ($students as $key => $value) {
                $result = ($value->result=='0')?'FAIL':'PASS';
                $s_no = $key+1;
             ?>
            <tr id="row_<?php echo $value->mark_id; ?>">
                <td><?php echo $key+1; ?></td>
                <td><?php echo $value->student_name; ?></td>
                <td><?php echo $value->mark_1; ?></td>
                <td><?php echo $value->mark_2; ?></td>
                <td><?php echo $value->mark_3; ?></td>
                <td><?php echo $value->total; ?></td>
                <td><?php echo $value->rank; ?></td>
                <td><?php echo $result; ?></td>
                <td>
<a  href="javascript:void(0);" onclick="editdetails('<?php echo $value->mark_id; ?>','<?php echo $s_no; ?>')" class="btn btn-primary">Edit</a>
<a  href="javascript:void(0);" class="btn btn-danger"  onclick="deletestudent('<?php echo $value->mark_id; ?>')">Delete</a>
                </td>
            </tr>

        <?php } } ?>
        </tbody>
    </table>


    <a href="javascript:void(0);" class="btn btn-primary"  style="float: right;"  id="addRow">Add</a>

</div>
</div>
</div>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script type="text/javascript">
$(document).ready(function() {
    <?php
            if(isset($students) && count($students)>0)
            $st_count = count($students); 
            else
            $st_count = '1'; 
    ?>
    var student_count = '<?php  echo $st_count; ?>';
    var t = $('#example1').DataTable();
    var counter = '';
 
    $('#addRow').on('click', function () {
        t.row.add( [
           '<?php echo $st_count; ?>',
            '<input  type="text" name="student_name" id="student_name" style="width:100px;" onkeypress="return onlyAlphabets(event,this);" >',
            '<input type="text" name="mark_1" id="mark_1"  style="width:100px;"  onkeypress="return isNumber(event)">',
           '<input type="text" name="mark_2" id="mark_2"  style="width:100px;" onkeypress="return isNumber(event)">',
            '<input type="text" name="mark_3" id="mark_3"  style="width:100px;" onkeypress="return isNumber(event)">',
            '<input type="text" name="total" id="total"  style="width:100px;" onkeypress="return isNumber(event)">',
            '<input type="text" name="rank" id="rank"  style="width:100px;" onkeypress="return isNumber(event)">',
'<select name="result" id="result"><option value="1">PASS</option> <option value="0">FAIL</option> </select>',
            '<input type="button" class="btn btn-primary" onclick="newresult()" value="Save"/>',
        ] ).draw( false );
 
        counter++;
    } );
 
} );



function newresult()
{
        var  student_name = $('#student_name').val();
        var  mark_1 = $('#mark_1').val();
        var  mark_2 = $('#mark_2').val();
        var  mark_3 = $('#mark_3').val();
        var  total = $('#total').val();
        var  rank = $('#rank').val();
        var  result = $('#result').val();

        if(student_name=='')
        {
            Swal.fire({
            title: "<i>Alert</i>", 
            html: "Enter Username",  
            });
            $('#student_name').focus();
        }
        else if(mark_1=='')
        {
            Swal.fire({
            title: "<i>Alert</i>", 
            html: "Enter mark 1",  
            });
            $('#mark_1').focus(); 
        }
        else if(mark_2=='')
        {
            Swal.fire({
            title: "<i>Alert</i>", 
            html: "Enter mark 2",  
            });
            $('#mark_2').focus(); 
        }
        else if(mark_3=='')
        {
            Swal.fire({
            title: "<i>Alert</i>", 
            html: "Enter mark 3",  
            });
            $('#mark_3').focus(); 
        }
        else if(total=='')
        {
            Swal.fire({
            title: "<i>Alert</i>", 
            html: "Enter total",  
            });
            $('#total').focus(); 
        }
        else if(rank=='')
        {
            Swal.fire({
            title: "<i>Alert</i>", 
            html: "Enter rank",  
            });
            $('#rank').focus(); 
        }
        else if(result=='')
        {
            Swal.fire({
            title: "<i>Alert</i>", 
            html: "Enter result",  
            });
            $('#result').focus(); 
        }
        else
       {
           $.post("<?php echo base_url('student/saveresult'); ?>",{student_name:student_name,mark_1:mark_1,mark_2:mark_2,mark_3:mark_3,total:total,rank:rank,result:result},function(response) 
            {
              $('#tbody_div').html(response);
            });
       }
}


function onlyAlphabets(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode == 32) || (charCode > 65 && charCode < 91) || (charCode > 96 && charCode < 123))

                    return true;
                else
                    return false;
            }
            catch (err) {
                alert(err.Description);
            }
        }


function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}


function editdetails(mark_id,s_no)
{
     if(mark_id!='')
     {
        $.post("<?php echo base_url('student/editdetails'); ?>",{mark_id:mark_id,s_no:s_no},function(response) 
            {
              $('#row_'+mark_id).html(response);
            });  
     }
}


function updaterow(mark_id)
{
        var  student_name = $('#student_name_'+mark_id).val();
        var  mark_1 = $('#mark_1_'+mark_id).val();
        var  mark_2 = $('#mark_2_'+mark_id).val();
        var  mark_3 = $('#mark_3_'+mark_id).val();
        var  total = $('#total_'+mark_id).val();
        var  rank = $('#rank_'+mark_id).val();
        var  result = $('#result_'+mark_id).val();

        if(student_name=='')
        {
            Swal.fire({
            title: "<i>Alert</i>", 
            html: "Enter Username",  
            });
            $('#student_name').focus();
        }
        else if(mark_1=='')
        {
            Swal.fire({
            title: "<i>Alert</i>", 
            html: "Enter mark 1",  
            });
            $('#mark_1').focus(); 
        }
        else if(mark_2=='')
        {
            Swal.fire({
            title: "<i>Alert</i>", 
            html: "Enter mark 2",  
            });
            $('#mark_2').focus(); 
        }
        else if(mark_3=='')
        {
            Swal.fire({
            title: "<i>Alert</i>", 
            html: "Enter mark 3",  
            });
            $('#mark_3').focus(); 
        }
        else if(total=='')
        {
            Swal.fire({
            title: "<i>Alert</i>", 
            html: "Enter total",  
            });
            $('#total').focus(); 
        }
        else if(rank=='')
        {
            Swal.fire({
            title: "<i>Alert</i>", 
            html: "Enter rank",  
            });
            $('#rank').focus(); 
        }
        else if(result=='')
        {
            Swal.fire({
            title: "<i>Alert</i>", 
            html: "Enter result",  
            });
            $('#result').focus(); 
        }
        else
       {
           $.post("<?php echo base_url('student/updateresult'); ?>",{mark_id:mark_id,student_name:student_name,mark_1:mark_1,mark_2:mark_2,mark_3:mark_3,total:total,rank:rank,result:result},function(response) 
            {
              $('#tbody_div').html(response);
            });
       } 
}

function deletestudent(mark_id)
{
if (confirm("Are you sure want to delete student?")) 
   {

       $.post("<?php echo base_url('student/deletestudent'); ?>",{mark_id:mark_id},function(response) 
        {
             $('#tbody_div').html(response);
        });
     }
}

</script>
<?php include_once('footer.php'); ?>