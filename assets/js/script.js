jQuery(function ($) {
  // テキストスライドイン
  $(".js-text-slideIn").each(function () {
    $(this).html(
      $(this)
        .text()
        .trim()
        .split("")
        .map((char, index) => `<span style="--index: ${index}">${char}</span>`)
        .join("")
    );
  });
  $(window)
    .on("scroll", function () {
      $(".js-text-slideIn").each(function () {
        if (
          $(this).offset().top <
          $(window).scrollTop() + $(window).height() * 0.8
        ) {
          $(this).addClass("is-active");
        }
      });
    })
    .trigger("scroll");

  // ハンバーガーメニュー
  $(function () {
    $(".js-hamburger").click(function () {
      $(this).toggleClass("is-open");
      $(".js-drawer").toggleClass("is-open");
    });
    $(".js-drawer a[href]").on("click", function () {
      $(".js-hamburger").removeClass("is-open");
      $(".js-drawer").removeClass("is-open");
    });
    $(window).on("resize", function () {
      if (window.matchMedia("(min-width: 768px)").matches) {
        $(".js-hamburger").removeClass("is-open");
        $(".js-drawer").removeClass("is-open");
      }
    });
  });

  // モーダル
  $(".js-modal-open").each(function () {
    $(this).on("click", function (e) {
      e.preventDefault();
      e.stopPropagation();
      closeModal();
      var target = $(this).data("target");
      var modal = document.getElementById(target);
      if (!modal) return;
      $(modal).fadeIn().addClass("is-open");
      $("html,body").css("overflow", "hidden");
    });
  });
  function closeModal() {
    $(".js-modal.is-open").fadeOut(function () {
      $(this).removeClass("is-open");
    });
    $("html,body").css("overflow", "initial");
  }
  $(document).on("click", ".js-modal-close", function (e) {
    e.preventDefault();
    e.stopPropagation();
    closeModal();
  });
  $(document).on("click", function (e) {
    var $openModal = $(".js-modal.is-open");
    if (!$openModal.length) return;
    if ($(e.target).closest(".js-modal").length) {
      return;
    }
    closeModal();
  });

  // カード時間差
  $(window)
    .on("scroll", function () {
      $(".js-fadeIn").each(function (index) {
        if (
          $(this).offset().top <
          $(window).scrollTop() + $(window).height() * 0.8
        ) {
          setTimeout(() => {
            $(this).addClass("is-active");
          }, index * 10);
        }
      });
    })
    .trigger("scroll");
});
