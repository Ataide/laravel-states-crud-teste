$('#create').submit(function(e) {
  e.preventDefault();
  _nome = $('#create input[name=nome]').val();
  _sigla = $('#create input[name=sigla]').val();
  _historico = $('#create textarea[name=historico]').val();

  $.ajax({
          url: "/ajaxEstados",
          method: "POST",
          data:{_token: window.Laravel.csrfToken, nome: _nome, sigla: _sigla, historico: _historico}
        }).done(function(response) {
          if(response.status == 'success') {
            insertNewEstado(response.estado, response.perma);
            $('#modalCreate').modal('toggle');
          }else{
            alert('Ocorreu um erro.');
          }
        });
});

$('#edit').submit(function(e) {
  e.preventDefault();
  _id = $('#edit input[name=id]').val();
  _nome = $('#edit input[name=nome]').val();
  _sigla = $('#edit input[name=sigla]').val();
  _historico = $('#edit textarea[name=historico]').val();

  $.ajax({
          url: "/ajaxEstados",
          method: "PUT",
          data:{_token: window.Laravel.csrfToken, id: _id ,nome: _nome, sigla: _sigla, historico: _historico}
        }).done(function(response) {
          if(response.status == 'success') {
            update_row(_id,_nome,_sigla,_historico);
            $('#modalEdit').modal('toggle');
          }

        });
});

$('.remove').click(_delete);

$('button[data-target="#modalShow"]').click(show);

$('button[data-target="#modalEdit"]').click(edit);

function edit() {
  var a = $(this);
  var tds = $(this).parent().parent().find('td');
  var form_edit = $('#edit');
  var data_array = [];
  $.each(tds, function( index, value ) {
    data_array.push($(value).html());
  });

  $('#edit input[name=id]').val(data_array[0]);
  $('#edit input[name=nome]').val(data_array[1]);
  $('#edit input[name=sigla]').val(data_array[2]);
  $('#edit textarea[name=historico]').val(data_array[3]);

}

function show(){
  var a = $(this);
  var tds = $(this).parent().parent().find('td');
  var form_edit = $('#show');
  var data_array = [];
  $.each(tds, function( index, value ) {
    data_array.push($(value).html());
  });
  $('#show input[name=nome]').val(data_array[1]);
  $('#show input[name=sigla]').val(data_array[2]);
  $('#show textarea[name=historico]').val(data_array[3]);
}

function _delete(){
  if(confirm('Deseja realmente deletar esse registro?')){
    var tr = $(this).parent().parent();
    $.ajax({
      url: "estados/"+ $(this).data('id'),
      method: "DELETE",
      data: { _token : window.Laravel.csrfToken }
    }).done(function(response) {
      console.log(response);
      tr.fadeOut( "slow" );
    });
  }
}

function update_row(id,nome,sigla,historico) {
  var tds = $('#row_'+id+' td');
  $.each(tds, function( index, value ) {
    if(index == 0) {
      $(value).html(id);
    }
    if(index == 1) {
      $(value).html(nome);
    }
    if(index == 2) {
      $(value).html(sigla);
    }
    if(index == 3) {
      $(value).html(historico);
    }

  });

}

function insertNewEstado(estado, perma) {
  var table = $('#list tbody');
  var ver_button = $('<button>', { class: 'btn btn-primary', text: 'Ver'});
  var edit_button = $('<button>', { class: 'btn btn-warning',text: 'Editar'});
  var delete_button = $('<button>', { class: 'btn btn-danger remove', text: 'Excluir'});

  $(ver_button).attr('data-toggle', 'modal');
  $(ver_button).attr('data-target', '#modalShow');
  $(ver_button).click(show);

  $(edit_button).attr('data-toggle', 'modal');
  $(edit_button).attr('data-target', '#modalEdit');
  $(edit_button).click(edit);

  $(delete_button).attr('data-id', estado.id);
  $(delete_button).click(_delete);



  var tr = $('<tr><td>'+estado.id+'</td><td>'+estado.nome+'</td><td>'+estado.sigla+'</td><td>'+estado.historico+'</td><td></td></tr>');
  perma.read ? $(tr).find('td:last').append(ver_button) : '' ;
  perma.update ? $(tr).find('td:last').append(edit_button) : '' ;
  perma.delete ? $(tr).find('td:last').append(delete_button) : '' ;


  tr.appendTo(table);
}
