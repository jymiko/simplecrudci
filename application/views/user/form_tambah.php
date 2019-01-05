<html>
  <head>
    <title>Form Tambah - CRUD Codeigniter</title>
  </head>
  <body>
    <h1>Form Tambah Data Mahasiswa</h1>
    <hr>
    <!-- Menampilkan Error jika validasi tidak valid -->
    <div style="color: red;"><?php echo validation_errors(); ?></div>
    <?php echo form_open_multipart("user/tambah"); ?>
      <table cellpadding="8">
      <tr>
          <td>Username</td>
          <td><input type="text" name="input_username" value="<?php echo set_value('input_username'); ?>"></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td><input type="text" name="input_nama" value="<?php echo set_value('input_nama'); ?>"></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><input type="text" name="input_email" value="<?php echo set_value('input_email'); ?>"></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="input_password" value="<?php echo set_value('input_password'); ?>"></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td><textarea name="input_alamat"><?php echo set_value('input_alamat'); ?></textarea></td>
        </tr>
        <tr>
          <td>Telepon</td>
          <td><input type="text" name="input_telp" value="<?php echo set_value('input_telp'); ?>"></td>
        </tr>
        <tr>
          <td>Upload Foto</td>
          <td>
          <input type="file" name="upload_foto" value="<?php echo set_value('upload_foto'); ?>"></td>
        </tr>
        <tr>
          <td>Role</td>
          <td>
            <select name="dropdown_role" id="role">
              <option value="user">User</option>
              <option value="admin">Admin</option>
            </select>
          </td>
        </tr>
      </table>
        
      <hr>
      <input type="submit" name="submit" value="Simpan">
      <a href="<?php echo base_url(); ?>"><input type="button" value="Batal"></a>
    <?php echo form_close(); ?>
  </body>
</html>