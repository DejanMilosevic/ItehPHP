
$("#dodajProizvod").submit(function () {

  var form = $("#dodajProizvod")[0];
  var formData = new FormData(form);
  event.preventDefault();
  console.log(formData);

  request = $.ajax({
    url: "handler/add.php",
    type: "post",
    processData: false,
    contentType: false,
    data: formData,
  });
  console.log(request);
  request.done(function (response, textStatus, jqXHR) {
    console.log(textStatus);
    console.log(jqXHR);
    console.log(response);

    if (response === "Success") {
      alert("Uspesno dodato");
    } else {
      console.log("Neuspesno" + response);
    }
  });

  request.fail(function (jqXHR, textStatus, errorThrown) {
    console.error("Greska: " + textStatus, errorThrown);
  });
});

function obrisiProizvod(deleteid) {
  request = $.ajax({
    url: "handler/delete.php",
    type: "post",
    data: { deleteid: deleteid },
  });

  request.done(function (response, textStatus, jqXHR) {
    console.log(textStatus);
    console.log(jqXHR);
    console.log(response);

    if (response === "Success") {
      alert("Uspesno obrisano");

      $("#proizvodi").html("");
      $.post("proizvodCards.php", function (data) {
        $("#proizvodi").html(data);
      });
    } else {
      console.log("Neuspesno" + response);
    }
  });

  request.fail(function (jqXHR, textStatus, errorThrown) {
    console.error("Greska: " + textStatus, errorThrown);
  });
}

function izmeniProizvod(updateid) {
  $(".proizvodi").html("");
  $.post("izmeniProizvod.php", { updateid: updateid }, function (data) {
    $(".proizvodi").html(data);
  });
}

$("#izmeniProizvod").submit(function () {
  var form = $("#izmeniProizvod")[0];
  console.log(form);
  var formData = new FormData(form);
  event.preventDefault();
  console.log(formData);

  request = $.ajax({
    url: "handler/update.php",
    type: "post",
    processData: false,
    contentType: false,
    data: formData,
  });
  console.log(request);
  request.done(function (response, textStatus, jqXHR) {
    console.log(textStatus);
    console.log(jqXHR);
    console.log(response);

    if (response === "Success") {
      alert("Uspesno izmenjeno");

    } else {
      console.log("Neuspesno" + response);
    }
  });

  request.fail(function (jqXHR, textStatus, errorThrown) {
    console.error("Greska: " + textStatus, errorThrown);
  });
});

function sortirajPoCeni() {
  var sortiraj = $("#sortiraj").val();

  $("#proizvodi").html("");
  $.post("proizvodCards.php", { sortiraj: sortiraj }, function (data) {
    $("#proizvodi").html(data);
  });
}

function pretraga() {
  var input, radios, radio_filter, text_filter, td0, i, divList;

  input = document.getElementById("form1");
  text_filter = input.value.toUpperCase();
  divList = $(".card");
  console.log(divList);

  for (i = 0; i < divList.length; i++) {
    console.log(divList[i]);
    td0 = divList[i].getElementsByTagName("h4")[0].innerHTML;
    console.log(td0);
    if (td0) {
      if (td0.toUpperCase().indexOf(text_filter) > -1) {
        divList[i].style.display = "";
      } else {
        divList[i].style.display = "none";
      }
    }
  }
}
