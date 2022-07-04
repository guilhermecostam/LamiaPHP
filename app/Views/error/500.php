<?php include __DIR__ . '/_partials/header.php'; ?>

    <main>
      <section class="s-hero">
        <div class="container">
          <div class="title-box">
            <h2>
                500 - <span class="name"> Server error</span>
            </h2>
            <div class='trigger'>
                <?php echo
                "[ Linha {$args['throwable']->getLine()} ] {$args['throwable']->getMessage()}"
                ?>
                <small><?php echo $args['throwable']->getFile() ?></small>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php include __DIR__ . '/_partials/footer.php'; ?>
