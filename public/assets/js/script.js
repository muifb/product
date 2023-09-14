// console.log('OK!');

var tooltipTriggerList = [].slice.call(
  document.querySelectorAll('[data-bs-toggle="tooltip"]')
);
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl);
});

// awal jam
function showTime() {
  var date = new Date();
  var h = date.getHours();
  var m = date.getMinutes();
  var s = date.getSeconds();
  var session = "AM";

  if (h == 0) {
    h = 12;
  }
  if (h >= 12) {
    session = "PM";
  }

  if (h > 12) {
    h = h - 12;
  }
  h = h < 10 ? (h = "0" + h) : h;
  m = m < 10 ? (m = "0" + m) : m;
  s = s < 10 ? (s = "0" + s) : s;

  var time = h + ":" + m + ":" + s + " " + session;
  $("#clock").html(time);
  setTimeout(showTime, 1000);
}
showTime();
// akhir jam

$(function () {
  $("#dataProduct").DataTable({
    lengthMenu: [
      [6, 12, 24, -1],
      [6, 12, 24, "All"],
    ],
    pagingType: "full_numbers",
    ordering: false,
  });

  $("#vismenList").DataTable({
    lengthMenu: [
      [10, 25, 50, -1],
      [10, 25, 50, "All"],
    ],
    pagingType: "full_numbers",
    ordering: false,
  });

  $("#materialProduct").on("change", function () {
    const id = $("#materialProduct").val();

    $.ajax({
      url: "/landing/getProduct",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#idPro").val(data.id_product);
        $("#nmPro").val(data.nm_product);
        $("#nomorPro").val(data.id_product);
      },
    });
  });

  $("#pilStatus").on("change", function () {
    const status = $("#pilStatus").val();
    $(".status").val(status);
  });
  $("#pilAngka").on("change", function () {
    const angka = $("#pilAngka").val();
    $(".angka").val(angka);
  });
  // $("#matrNumber").on("change", function () {
  //   const material = $("#matrNumber").val();
  //   $(".matrial").val(material);
  // });

  $("#flatpickr1").flatpickr({
    enableTime: true,
    enableSeconds: true,
    defaultHour: new Date().getHours(),
    defaultMinute: new Date().getMinutes(),
    defaultSeconds: new Date().getSeconds(),
    altInput: true,
    dateFormat: "Y-m-d H:i:S",
    onChange: (selectedDates, dateStr, instance) => {
      $(".start").val(dateStr);
    },
  });

  $("#flatpickr2").flatpickr({
    enableTime: true,
    enableSeconds: true,
    defaultHour: new Date().getHours(),
    defaultMinute: new Date().getMinutes(),
    defaultSeconds: new Date().getSeconds(),
    altInput: true,
    dateFormat: "Y-m-d H:i:S",
    onChange: (selectedDates, dateStr, instance) => {
      $(".finish").val(dateStr);
    },
  });

  $("#tanggalLost").flatpickr({
    locale: "id",
    altInput: true,
    altFormat: "j F Y",
    dateFormat: "Y-m-d",
    allowInput: true,
  });
  $("#waktuStart").flatpickr({
    noCalendar: true,
    enableTime: true,
    enableSeconds: true,
    defaultHour: new Date().getHours(),
    defaultMinute: new Date().getMinutes(),
    defaultSeconds: new Date().getSeconds(),
    altInput: true,
    altFormat: "H:i:s",
    dateFormat: "H:i:s",
    time_24hr: true,
    allowInput: true,
  });
  $("#waktuStop").flatpickr({
    noCalendar: true,
    enableTime: true,
    enableSeconds: true,
    defaultHour: new Date().getHours(),
    defaultMinute: new Date().getMinutes(),
    defaultSeconds: new Date().getSeconds(),
    altInput: true,
    altFormat: "H:i:s",
    dateFormat: "H:i:s",
    time_24hr: true,
    allowInput: true,
  });

  $("#startProduksi").flatpickr({
    locale: "id",
    enableTime: true,
    defaultHour: new Date().getHours(),
    defaultMinute: new Date().getMinutes(),
    altInput: true,
    altFormat: "j F Y, l H:i",
    dateFormat: "Y-m-d H:i",
    allowInput: true,
  });

  $("#finishProduksi").flatpickr({
    locale: "id",
    enableTime: true,
    defaultHour: new Date().getHours(),
    defaultMinute: new Date().getMinutes(),
    altInput: true,
    altFormat: "j F Y, l H:i",
    dateFormat: "Y-m-d H:i",
    allowInput: true,
  });

  $("#pengiriman").flatpickr({
    locale: "id",
    altInput: true,
    altFormat: "j F Y",
    dateFormat: "Y-m-d",
    allowInput: true,
  });

  $("#tglAwal").flatpickr({
    locale: "id",
    altInput: true,
    altFormat: "j F Y",
    dateFormat: "Y-m-d",
    allowInput: true,
  });

  $("#tglSampai").flatpickr({
    locale: "id",
    altInput: true,
    altFormat: "j F Y",
    dateFormat: "Y-m-d",
    allowInput: true,
  });

  $("#modalStart").flatpickr({
    enableTime: true,
    enableSeconds: true,
    defaultHour: new Date().getHours(),
    defaultMinute: new Date().getMinutes(),
    defaultSeconds: new Date().getSeconds(),
    dateFormat: "Y-m-d H:i:S",
  });

  $("#modalFinish").flatpickr({
    enableTime: true,
    enableSeconds: true,
    defaultHour: new Date().getHours(),
    defaultMinute: new Date().getMinutes(),
    defaultSeconds: new Date().getSeconds(),
    dateFormat: "Y-m-d H:i:S",
  });

  $(".tampilModalResend").on("click", function () {
    const id = $(this).data("id");

    $.ajax({
      url: "/produksi/get-report",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#modalIdReport").val(data.id_report);
        $("#modalBatch").val(data.nm_batch);
        $("#modalProduct").val(data.id_product);
        $("#modalMaterial").val(data.material);
        $("#modalStatus").val(data.status_pro);
        $("#modalStart").val(data.mulai_pro);
        $("#modalFinish").val(data.selesai_pro);
        $("#modalAngka").val(data.angka);
        $("#modalPanjang").val(data.panjang_qty);
        $("#modalUkuran").val(data.qty_palet);
        $("#modalDefect").val(data.kat_defect);
      },
    });
  });

  $("[data-bs-dismiss=modal]").on("click", function () {
    $(".modal-body form")
      .find("input,textarea,select")
      .val("")
      .end()
      .find("input[type=checkbox], input[type=radio]")
      .prop("checked", "")
      .end();
  });

  $("#editReceipt").DataTable({
    lengthMenu: [
      [6, 12, 24, -1],
      [6, 12, 24, "All"],
    ],
    pagingType: "full_numbers",
    ordering: false,
  });

  $(".waktu").on("change", function () {
    var waktuMulai = $("#waktuStart").val(),
      waktuSelesai = $("#waktuStop").val(),
      hours = waktuSelesai.split(":")[0] - waktuMulai.split(":")[0],
      minutes = waktuSelesai.split(":")[1] - waktuMulai.split(":")[1];

    if (waktuMulai <= "12:00:00" && waktuSelesai >= "13:00:00") {
      a = 1;
    } else {
      a = 0;
    }
    minutes = minutes.toString().length < 2 ? minutes : minutes;
    if (minutes < 0) {
      hours--;
      minutes = 60 + minutes;
    }
    hours = hours.toString().length < 2 ? hours : hours;

    $("#selisihMinute").val(minutes);
    $("#selisihHour").val(hours);
  });
});
