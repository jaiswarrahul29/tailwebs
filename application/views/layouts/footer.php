    <div class="alertSection">
        <!-- SUCCESS ALERT  -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- ERROR ALERT  -->
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>



    <!-- BOOTSTRAP JS  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- JQUERY CDN  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- DATATABLE JS  -->
    <script src="https://cdn.datatables.net/2.1.5/js/dataTables.min.js"></script>
    <!-- JAVASCRIPT  -->
    <script src="<?php echo base_url() ?>assets/js/script.js?V=<?php echo md5(date('dmyHsi')) ?>"></script>

    <script>
        const base_url = "<?php echo base_url() ?>";
        new DataTable('#datatable', {
            language: {
                searchPlaceholder: 'Search Student'
            }
        });
    </script>

    </body>

    </html>