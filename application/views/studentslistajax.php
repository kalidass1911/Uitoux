       <?php if($students) { foreach ($students as $key => $value) {
 $result = ($value->result=='0')?'FAIL':'PASS';
        ?>
            <tr id="<?php echo $value->mark_id; ?>">
                <td><?php echo $key+1; ?></td>
                <td><?php echo $value->student_name; ?></td>
                <td><?php echo $value->mark_1; ?></td>
                <td><?php echo $value->mark_2; ?></td>
                <td><?php echo $value->mark_3; ?></td>
                <td><?php echo $value->total; ?></td>
                <td><?php echo $value->rank; ?></td>
                <td><?php echo $result; ?></td>
                <td>
<a  href="<?php echo base_url('Student/editproduct/'.$value->mark_id); ?>" class="btn btn-primary">Edit</a>
<a  href="javascript:void(0);" class="btn btn-danger"  onclick="deletestudent('<?php echo $value->mark_id; ?>')">Delete</a>

                </td>
            </tr>

        <?php } } ?>
       