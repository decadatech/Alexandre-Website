function showStore() {
  const selectedCity = $('#city').val();
  const selectedUf = $('#uf').val();

  if (selectedCity != '' && selectedUf != '') {
    $('.store').show();
  } else {
    $('.store').hide();
  }
}
