<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 28.04.2017
 * Time: 18:15
 */
class Fileupload
{
    function do_upload($upload_path = null, $field_name = null) {
        if (empty($_FILES[$field_name]['name'])) {
            return null;
        } else {
            //-----------------------------
            $ci =& get_instance();
            $ci->load->helper('url');

            //folder upload
            $file_path = $upload_path ;
            if (!is_dir($file_path)) {
                mkdir($file_path, 0755, true);
            }else {

            }

            $config = [
                'upload_path'   => $file_path,
                // 'file_name'     => time(),
                'allowed_types' => 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG',
                // 'max_size'      => 1024,
                // 'max_width'     => 1024,
                // 'max_height'    => 768,
                // 'min_width'     => 200,
                // 'min_height'    => 200,
                'max_filename'  => 5,
                'overwrite'     => false,
                'maintain_ratio' => true,
                'encrypt_name'  => true,
                'remove_spaces' => true,
                'file_ext_tolower' => true
            ];
            $ci->load->library('upload', $config);

            if (!$ci->upload->do_upload($field_name)) {
                return false;
            } else {
                $file = $ci->upload->data();
                return $file_path.$file['file_name'];
            }
        }
    }

    public function do_resize($file_path = null, $width = null, $height = null) {
        $ci =& get_instance();
        $ci->load->library('image_lib');
        $config = [
            'image_library'  => 'gd2',
            'source_image'   => $file_path,
            'create_thumb'   => false,
            'maintain_ratio' => false,
            'width'          => $width,
            'height'         => $height,
        ];
        // $ci->image_lib->clear();
        $ci->image_lib->initialize($config);
        $ci->image_lib->resize();
    }
}