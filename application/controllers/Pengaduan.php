class Pengaduan extends CI_Controller
{
    public function form()
    {
        $data['judul'] = 'Form Pengaduan';
        $this->load->view('pengaduan/form', $data);
    }
}