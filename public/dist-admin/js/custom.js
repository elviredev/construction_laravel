// Sidebar active state — runs immediately, then reveals nav
(function () {
  var page = location.pathname.split('/').pop() || 'index.html';
  $('.sidebar-nav .nav-link').each(function () {
    var href = $(this).attr('href');
    if (href === page) {
      $(this).addClass('active');
      var $dropdown = $(this).closest('.nav-dropdown');
      if ($dropdown.length) {
        $dropdown.addClass('open');
        $dropdown.find('.nav-dropdown-toggle').addClass('active');
      }
    }
  });
  $('.sidebar-nav').addClass('ready');
})();

$(function () {
  // Sidebar dropdown toggle
  $('.nav-dropdown-toggle').on('click', function () {
    $(this).closest('.nav-dropdown').toggleClass('open');
  });

  // TinyMCE
  if ($('#bioEditor').length) {
    tinymce.init({
      selector: '#bioEditor',
      height: 300,
      menubar: false,
      plugins: 'lists link image code table wordcount',
      toolbar: 'undo redo | formatselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image table | code | removeformat',
      content_style: 'body { font-family: system-ui, -apple-system, sans-serif; font-size: 14px; }',
      branding: false,
      promotion: false,
      skin: 'oxide',
      statusbar: true
    });
  }

  // Flatpickr
  if ($('#datepicker').length) {
    flatpickr('#datepicker', { dateFormat: 'Y-m-d' });
  }
  if ($('#timepicker').length) {
    flatpickr('#timepicker', { enableTime: true, noCalendar: true, dateFormat: 'h:i K', time_24hr: false });
  }
  if ($('#datetimepicker').length) {
    flatpickr('#datetimepicker', { enableTime: true, dateFormat: 'Y-m-d h:i K', time_24hr: false });
  }

  // Photo preview (form + profile)
  var $input = $('#photoUpload'), $preview = $('#photoPreview'), $icon = $('#previewIcon'), $wrap = $('#previewWrap'), $removeBtn = $('#removeBtn');

  if ($input.length) {
    $input.on('change', function () {
      var file = this.files[0];
      if (!file || !file.type.startsWith('image/')) return;
      var reader = new FileReader();
      reader.onload = function (e) {
        $preview.attr('src', e.target.result).removeClass('d-none');
        $icon.addClass('d-none');
        if ($wrap.hasClass('photo-preview-wrap')) {
          $wrap.addClass('has-photo');
        } else {
          $wrap.css('border-style', 'solid').css('border-color', 'var(--primary-300)').css('background', 'var(--gray-100)');
        }
        $removeBtn.addClass('show');
      };
      reader.readAsDataURL(file);
    });

    $removeBtn.on('click', function () {
      $input.val('');
      $preview.addClass('d-none').attr('src', '');
      $icon.removeClass('d-none');
      if ($wrap.hasClass('photo-preview-wrap')) {
        $wrap.removeClass('has-photo');
      } else {
        $wrap.css('border-style', 'dashed').css('border-color', '').css('background', 'var(--primary-600)');
      }
      $(this).removeClass('show');
    });
  }

  // DataTable
  if ($('#dataTable').length) {
    $('#dataTable').DataTable({
      pageLength: 10,
      order: [[0, 'asc']],
      scrollX: true,
      autoWidth: false,
      columnDefs: [{ orderable: false, targets: -1 }],
      language: {
        search: '_INPUT_',
        searchPlaceholder: 'Search employees\u2026',
        lengthMenu: 'Show _MENU_ entries'
      }
    });

    // Edit modal
    $(document).on('click', '.btn-edit-row', function () {
      $('#editName').val($(this).data('name'));
      $('#editEmail').val($(this).data('email'));
      new bootstrap.Modal($('#editModal')[0]).show();
    });
  }

  // Select2
  if ($('#languageSelect').length) {
    $('#languageSelect').select2({
      placeholder: 'Select a language',
      allowClear: true
    });
  }

});
