<?php
class block_birthday extends block_base {
    public function init() {
        $this->title = get_string('pluginname', 'block_birthday');
    }
    public function get_content() {
        if ($this->content !== null) {
            return $this->content;
        }
        $this->content = new stdClass();
        $this->content->text = "
<div id='popup' style='display: flex; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height:100%; background-color: rgba(0, 0, 0, 0.5);'>
    <div style='background-color: white; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 500px; height: 200px; text-align: center; border-radius: 5px;'>
        <span id='closePopup' style='color: #aaa; float: right; font-size: 28px; font-weight: bold; cursor: pointer;'>&times;</span>
        <h2>Selamat Ulang Tahun</h2>
        <p>Selamat kepada<br>";
        global $DB;
        // $siswas = $DB->get_record('tabel_siswa', ['kolom_tanggal_lahir' => date('d-m-Y')]);
        $siswas = $DB->get_records('siswa_ulang_tahun');
        if($siswas) foreach ($siswas as $siswa) {
            $this->content->text .= $siswa->nama . '<br>';
        }
        $this->content->text .= '
        yang telah berulang tahun, semoga panjang umur!</p>
    </div>
</div>';
        $this->content->footer = "
<script>
    document.getElementById('closePopup').onclick = function() {
        document.getElementById('popup').style.display = 'none';
    }

    // Menutup pop-up jika pengguna mengklik di luar pop-up
    window.onclick = function(event) {
        const popup = document.getElementById('popup');
        if (event.target === popup) {
            popup.style.display = 'none';
        }
    }
</script>";
        return $this->content;
    }
}