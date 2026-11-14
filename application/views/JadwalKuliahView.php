<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Document</title>
      <link
         href="<?= base_url('assets/css/bootstrap.min.css') ?>"
         rel="stylesheet"
      />
   </head>
   <body>
      <div>
         <?php $this->load->view('layout') ?>
         <button
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#exampleModal"
         >
            Tambah
         </button>
         <!-- Modal -->
         <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
         >
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Modal title
                     </h1>
                     <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                     ></button>
                  </div>
                  <div class="modal-body">...</div>
                  <div class="modal-footer">
                     <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                     >
                        Close
                     </button>
                     <button type="button" class="btn btn-primary">
                        Save changes
                     </button>
                  </div>
               </div>
            </div>
         </div>
         <table class="table table-success table-bordered table-sm">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Hari</th>
                  <th>Jam</th>
                  <th>Kode Mata Kuliah</th>
                  <th>Mata Kuliah</th>
                  <th>SKS</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($jadwalkuliahs as $jadwalkuliah): ?>
               <tr>
                  <td><?php echo $jadwalkuliah->id ?></td>
                  <td><?php echo $jadwalkuliah->hari ?></td>
                  <td><?php echo $jadwalkuliah->jam ?></td>
                  <td><?php echo $jadwalkuliah->kode ?></td>
                  <td><?php echo $jadwalkuliah->mata_kuliah ?></td>
                  <td><?php echo $jadwalkuliah->sks ?></td>
               </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
      <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
   </body>
</html>
