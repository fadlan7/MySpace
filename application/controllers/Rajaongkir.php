<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Rajaongkir extends CI_Controller
{
    private $api_key = 'e1a00d7500cbd448a553cfdc2406e698';


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
    }


    public function province()
    {


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // echo $response;
            $array_response = json_decode($response, true);
            // echo '<pre>';
            // print_r($array_response['rajaongkir']['results']);
            // echo '</pre>';
            $province = $array_response['rajaongkir']['results'];
            echo "<option value=''>-Select Province-</option>";
            foreach ($province as $key => $value) {
                echo "<option value='" . $value['province'] . "'id_province='" . $value['province_id'] . "'>" . $value['province'] . "</option>";
            }
        }
    }

    public function city()
    {
        $curl = curl_init();
        $province_id = $this->input->post('id_province');


        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $province_id,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // echo $response;
            $array_response = json_decode($response, true);
            $city = $array_response['rajaongkir']['results'];
            echo "<option value=''>-Select City-</option>";
            foreach ($city as $key => $value) {
                echo "<option value='" . $value['city_name'] . "'  id_city='" . $value['city_id'] . "'>" . $value['city_name'] . "</option>";
            }
        }
    }

    public function courier()
    {
        echo '<option value="">-Choose Courier-</option>';
        echo '<option value="pos">Pos Indonesia</option>';
        echo '<option value="jne">JNE</option>';
        echo '<option value="tiki">TIKI</option>';
    }

    public function delivery()
    {
        $id_hometown = $this->m_admin->data_setting()->location;
        $courier = $this->input->post('courier');
        $id_city = $this->input->post('id_city');
        $weight = $this->input->post('weight');


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=" . $id_hometown . "&destination=" . $id_city . "&weight=" . $weight . "&courier=" . $courier,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: $this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // echo $response;
            $array_response = json_decode($response, true);
            // echo '<pre>';
            // print_r($array_response['rajaongkir']['results'][0]['costs']);
            // echo '</pre>';
            $delivery = $array_response['rajaongkir']['results'][0]['costs'];
            echo '<option value="">-Choose Delivery Type-</option>';
            foreach ($delivery as $key => $value) {
                echo "<option value='" . $value['service'] . "' shipping='" . $value['cost'][0]['value'] . "'estimation='" . $value['cost'][0]['etd']  . " Hari'>";
                echo $value['service'] . " | Rp." . $value['cost'][0]['value'] . " | " . $value['cost'][0]['etd'] . " Hari";
                echo "</option>";
            }
        }
    }
}
