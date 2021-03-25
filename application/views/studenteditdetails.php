       <?php if($student) {
                 $details = $student[0];
                 $mark_id = $details->mark_id;
                    $student_name = $details->student_name;
                    $mark_1 = $details->mark_1;
                    $mark_2 = $details->mark_2;
                    $mark_3 = $details->mark_3;
                    $total = $details->total;
                    $rank = $details->rank;
                    $result = $details->result;
        ?>
                <td><?php echo $s_no; ?></td>
                <td><input type="text"  value="<?php echo $student_name; ?>" style="width:100px;" name="student_name" id="student_name_<?php echo $mark_id; ?>" onkeypress="return onlyAlphabets(event,this);" ></td>
                <td><input type="text"  value="<?php echo $mark_1; ?>"  style="width:100px;" name="mark_1" id="mark_1_<?php echo $mark_id; ?>"  onkeypress="return isNumber(event)"></td>
                <td> <input type="text"  value="<?php echo $mark_2; ?>"  style="width:100px;" name="mark_2" id="mark_2_<?php echo $mark_id; ?>"  onkeypress="return isNumber(event)"> </td>
                <td> <input type="text"  value="<?php echo $mark_3; ?>"  style="width:100px;" name="mark_3" id="mark_3_<?php echo $mark_id; ?>"  onkeypress="return isNumber(event)"></td>
                <td> <input type="text"  value="<?php echo $total; ?>"  style="width:100px;" name="total" id="total_<?php echo $mark_id; ?>"  onkeypress="return isNumber(event)"></td>
                <td> <input type="text"  value="<?php echo $rank; ?>" style="width:100px;" name="rank" id="rank_<?php echo $mark_id; ?>"  onkeypress="return isNumber(event)"></td>
                <td><select style="width:100px;" name="result" id="result_<?php echo $mark_id; ?>"><option value="1" <?php echo ($result==1)?'selected':''; ?>>PASS</option> <option value="0" <?php echo ($result==0)?'selected':''; ?> >FAIL</option> </select></td>
                <td>
<a  href="javascript:void(0);" onclick="updaterow('<?php echo $mark_id; ?>')" class="btn btn-primary">Update</a>
                </td>
        <?php  } ?>
       