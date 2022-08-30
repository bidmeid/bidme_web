@extends('layouts.frontend.app')
@section('content')
<main>

  @component('components.frontend.breadcrumb')
        @slot('breadcrumb')
        <div class="page__title-wrapper text-center">
         <h3>Hi <?php echo ucfirst($data['user']->role); ?>, <?php echo $data['user']->name; ?></h3>
          
      </div>
        @endslot
    @endcomponent

    <!-- contact area start  -->
    <section class="contact__area pb-150 p-relative z-index-1">
      <div class="container">
         <div class="row">
            <div class="col-xxl-10 offset-xxl-1 col-xl-10 offset-xl-1 col-lg-10 offset-lg-1">
               <div class="contact__wrapper white-bg mt--70 p-relative z-index-1 wow fadeInUp" data-wow-delay=".3s">
                   
                  <div class="row">
                     <div class="col-md-12 order-md-1">
                       <h4 class="mb-3">Informasi Kontak Akun</h4>
					   <div class="alert alert-warning" role="alert" id="alert"></div>
                       <form class="contact__form fw-bolder" id="account">          
                         <div class="mb-3">
                           <label for=" email">Nama</label>
                           <input type="text" name="name" class="form-control" value="<?php echo $data['user']->name; ?>">
                           <div class="invalid-feedback">
                             Please enter a valid email address for shipping updates.
                           </div>
                         </div>
             
                         <div class="mb-3">
                           <label for="email">Email</label>
                           <input type="email" class="form-control" value="<?php echo $data['user']->email; ?>" disabled>
                           <div class="invalid-feedback">
                             Please enter a valid email address for shipping updates.
                           </div>
                         </div>

                         <div class="mb-3">
                           <label for="email">No Telpon</label>
                           <input type="number" name="no_telp" class="form-control col-5" placeholder="08xxxxxxxxx" value="<?php echo $data['user']->no_telp; ?>" >
                           <div class="invalid-feedback">
                             Please enter a valid email address for shipping updates.
                           </div>
                         </div>
						 <div class="mb-3">
                           <label for="email">Kabupaten/Kota</label>
                           <input type="text" name="region" class="form-control" placeholder="Kabupaten/Kota">
                           <div class="invalid-feedback">
                             Please enter a valid email address for shipping updates.
                           </div>
                         </div>
             
                         <div class="mb-3">
                           <label for="address">Address</label>
                           <input type="text" class="form-control" id="address" placeholder="Alamat Lengkap" value="<?php echo $data['user']->alamat; ?>" >
                           <div class="invalid-feedback">
                             Please enter your shipping address.
                           </div>
                         </div>
						 <br>
                         <button class="btn btn-primary btn-lg btn-block" type="submit">Simpan Perubahan</button>
                       </form>
                     </div>
                   </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

window.onload = function() {
	<?php if($data['user']->no_telp == '0'){ ?>
	$("#alert").html('Mohon segera lengkapi informasi akun anda di bawah ini!');
	setTimeout(function() {
    $("input[name=no_telp]").focus();
    $("input[name=no_telp]").val('');
    
	}, 1000); 
	<?php }elseif($data['user']->region == ''){ ?>
	$("#alert").html('Mohon segera lengkapi informasi akun anda di bawah ini!');
	setTimeout(function() {
    $("input[name=region]").focus();
    $("input[name=region]").val('');
	}, 1000); 
	<?php } ?>
}

$("#account").submit(function(event) {
		event.preventDefault();
		 
		var path = ServerUrl+"/api/update_account";
		swal("Apakah anda yakin ?", {
                    buttons: {
                        cancel: "Batalkan l!!",
                        catch: {
                            text: "Simpan !",
                            value: "yes",
                        },
                        
                    },
                })
                .then((value) => {
					if(value == 'yes'){
						$(":submit").prop("disabled", false);

								$.ajax({
									data: $('#account').serialize(),
									url: path,
									crossDomain: false,
									method: 'POST',
									complete: function(response){                
									if(response.status == 201){
										swal({
												title: 'Saved!',
												text: response.responseJSON.message,
												icon:'success',
												onClose: function () {
												window.location.reload();
												}
											}); 
									}else{
										swal({
												title: 'Aborted!',
												text: response.responseJSON.message,
												icon:'warning',
												onClose: function () {
												$(":submit").prop("disabled", false);
												window.location.reload();									
												}
											});	 
									}
									},
									dataType:'json'
						});
					}
                });
				
	});

</script>
@endsection