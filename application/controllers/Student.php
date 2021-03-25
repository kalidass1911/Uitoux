<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['title'] = 'Student List';

        $data['students'] = $this->common->getstudents();

		$this->load->view('studentslist',$data);
	}


    function saveresult()
    {
        $postdata = $this->input->post();  

        if(!empty($postdata['student_name']) && !empty($postdata['mark_1']) && !empty($postdata['mark_2']) && !empty($postdata['mark_3']) && !empty($postdata['total']) && !empty($postdata['rank']))
        {

            $student_details = [];
            $student_details['student_name'] = $postdata['student_name'];
            $student_details['added_date'] = date('Y-m-d H:i:s');
            $student_id = $this->common->insert('tb_student_details',$student_details); 

                if($student_id)
                {
                        $tb_student_marks =[]; 
                        $tb_student_marks['student_id'] = $student_id;
                        $tb_student_marks['mark_1'] = $postdata['mark_1'];
                        $tb_student_marks['mark_2'] = $postdata['mark_2'];
                        $tb_student_marks['mark_3'] = $postdata['mark_3'];
                        $tb_student_marks['total'] = $postdata['total'];
                        $tb_student_marks['rank'] = $postdata['rank'];
                        $tb_student_marks['result'] = $postdata['result'];
                        $tb_student_marks['added_date'] = date('Y-m-d H:i:s');
                        $student_id = $this->common->insert('tb_student_marks',$tb_student_marks);  
                }

                $data['students'] = $this->common->getstudents();

                echo $this->load->view('studentslistajax',$data,true);
        }
    }


    function updateresult()
    {
        $postdata = $this->input->post();  

        if(!empty($postdata['student_name']) && !empty($postdata['mark_1']) && !empty($postdata['mark_2']) && !empty($postdata['mark_3']) && !empty($postdata['total']) && !empty($postdata['rank']) && !empty($postdata['mark_id']))
        {
            $student = $this->common->getstudents($postdata['mark_id']);
            $student_details = $condition = [];
            $condition['id'] = $student[0]->student_id; 
            $student_details['student_name'] = $postdata['student_name'];
            $student_details['updated_date'] = date('Y-m-d H:i:s');
            $this->common->updatedata('tb_student_details',$student_details, $condition); 

            $tb_student_marks = $condition_marks = []; 
            $condition_marks['mark_id'] =$postdata['mark_id']; 
            $tb_student_marks['mark_1'] = $postdata['mark_1'];
            $tb_student_marks['mark_2'] = $postdata['mark_2'];
            $tb_student_marks['mark_3'] = $postdata['mark_3'];
            $tb_student_marks['total'] = $postdata['total'];
            $tb_student_marks['rank'] = $postdata['rank'];
            $tb_student_marks['result'] = $postdata['result'];
            $tb_student_marks['updated_date'] = date('Y-m-d H:i:s');
            $this->common->updatedata('tb_student_marks',$tb_student_marks,$condition_marks);  

            $data['students'] = $this->common->getstudents();
            echo $this->load->view('studentslistajax',$data,true);
            die;
        } 
    }





    function editdetails()
    {
    	 $mark_id = $this->input->post('mark_id'); 
         $s_no = $this->input->post('s_no');

         $data['title'] = 'Update Student';
         $data['s_no'] = $s_no;

         if(!empty($mark_id))
         {
                 $data['student'] = $this->common->getstudents($mark_id);
                 echo $this->load->view('studenteditdetails',$data,true); 
                 die;
         }
    }


    function deletestudent()
    {
         $mark_id = $this->input->post('mark_id'); 
          if(!empty($mark_id))
          {
                    $student = $this->common->getstudents($mark_id);
                    $student_details = $condition = [];
                    $condition['id'] = $student[0]->student_id; 
                    $student_details['status'] = '0';
                    $student_details['updated_date'] = date('Y-m-d H:i:s');
                    $this->common->updatedata('tb_student_details',$student_details, $condition);

                    $tb_student_marks = $condition_marks = []; 
                    $condition_marks['mark_id'] =$mark_id; 
                    $tb_student_marks['status'] = '0';
                    $tb_student_marks['updated_date'] = date('Y-m-d H:i:s');
                    $this->common->updatedata('tb_student_marks',$tb_student_marks,$condition_marks);

                     $data['students'] = $this->common->getstudents();
                    echo $this->load->view('studentslistajax',$data,true);
                    die;
          }
    }

}
