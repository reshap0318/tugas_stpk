<input type="hidden" name="last_username" value="<?php if(isset($data['username'])){echo $data['username'];} ?>">
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" value="<?php if(isset($data['username'])){echo $data['username'];} ?>"  id="username" name="username" placeholder="ex : 1611522012" required>
        <span class="messages popover-valid"></span>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" value="<?php if(isset($data['nama'])){echo $data['nama'];} ?>"  id="nama" name="nama" placeholder="ex : Reinaldo Shandev Pratama" required>
        <span class="messages popover-valid"></span>
  </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">password</label>
    <div class="col-sm-10">
        <input type="password" class="form-control" value=""  id="password" name="password" placeholder="*******" required>
        <span class="messages popover-valid"></span>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Hak Akses</label>
    <div class="col-sm-10">
      <select class="form-control" name="hak_akses" required>
        <?php if($hak_akses==1){ ?>
        <option value="1" <?php if(isset($data['hak_akses'])){if($data['hak_akses']==1){echo "selected";}} ?>>Admin</option>
        <?php } ?>
      </select>
      <span class="messages popover-valid"></span>
    </div>
</div>
