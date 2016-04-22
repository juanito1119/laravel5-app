$(document).on('ready', function(){
  var responsiveHelper;
  var breakpointDefinition = {
      tablet: 1024,
      phone : 480
  };
  var tableElement = $('table.datatables');
  $('table.datatables').DataTable({
    autoWidth        : false,
    preDrawCallback: function () {
        // Initialize the responsive datatables helper once.
        if (!responsiveHelper) {
            responsiveHelper = new ResponsiveDatatablesHelper(tableElement, breakpointDefinition);
        }
    },
    rowCallback    : function (nRow) {
        responsiveHelper.createExpandIcon(nRow);
    },
    drawCallback   : function (oSettings) {
        responsiveHelper.respond();
    },
    sDom: '<"col-lg-6" l f>\
      <"col-lg-6" T>\
      <"col-lg-12" r t>\
      <"col-lg-12 text-center" i>\
      <"col-lg-12 text-center" p>\
    ',
    oLanguage:{
      sLengthMenu     :'_MENU_',
      sProcessing     : 'Procesando Guapo',
      sSearch         :'',
      sSearchPlaceholder: 'Buscar Algo',
      "sEmptyTable":    "Ningún dato disponible en esta tabla",
      "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
      oPaginate: {
        sNext       : '<i class="fa fa-angle-right"></i>',
        sLast       : '<i class="fa fa-angle-double-right"></i>',
        sFirst      : '<i class="fa fa-angle-double-left"></i>',
        sPrevious   : '<i class="fa fa-angle-left"></i>'
      }
    },
    tableTools: {
      aButtons: [
        {
          sExtends    : 'text',
          sButtonText : '<a href="'+window.location.origin+'/status/create"><i class="fa fa-plus"></i></a>'
        }
      ]
    },
    columnDefs: [
      {
        searchable: true,
        orderable: true,
        targets: 'all'
      }
    ],
    order: [[ 0, "ASC" ]]
  });

  $("table.datatables tbody a.delete").popConfirm({
    yesBtn: "Si",
    noBtn: "No",
    placement: 'left'
  });
});
