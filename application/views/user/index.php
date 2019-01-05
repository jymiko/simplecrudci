<html>
  <head>
    <title>CRUD Codeigniter</title>
  </head>
  <body>
    <h1>Data User</h1>
    <h4>Selamat datang <?php echo $username ?></h4>
    <hr>
    <a href='<?php echo base_url("Login/logout"); ?>'>Keluar</a><br><br>
    <a href='<?php echo base_url("user/tambah"); ?>'>Tambah Data</a><br><br>
    <table border="1" cellpadding="7">
      <tr>
        <th>Username</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Password</th>
        <th>Alamat</th>
        <th>No Telepon</th>
        <th>Foto</th>
        <th>Role</th>
        <th>Image</th>
        <th colspan="2">Aksi</th>
      </tr>
      <?php
      if( ! empty($users)){
        foreach($users as $data){
          echo "<tr>
          <td>".$data->username."</td>
          <td>".$data->name."</td>
          <td>".$data->email."</td>
          <td>".md5($data->password)."</td>
          <td>".$data->address."</td>
          <td>".$data->phone_number."</td>
          <td>".$data->photo."</td>
          <td>".$data->role."</td>
          <td><img src='".base_url("uploads/".$data->photo)."' width='64' height='64'></td>
          <td><a href='".base_url("user/ubah/".$data->id)."'>Ubah</a></td>
          <td><a href='".base_url("user/hapus/".$data->id)."'>Hapus</a></td>
          </tr>";
        }
      }else{
        echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
      }
      ?>
    </table>
  </body>
</html>