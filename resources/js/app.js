import './bootstrap';

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

// NOTIFICAÇÕES DE ALERTAS
import Swal from 'sweetalert2';
window.Swal = Swal;

window.addEventListener('Swal:modal', event => {
    Swal.fire({
        title: event.detail.title,
        text: event.detail.text,
        icon: event.detail.type,
        imageUrl: event.detail.imageUrl,
        imageWidth: event.detail.imageWidth,
        imageHeight: event.detail.imageHeight,
        imageAlt: 'Admin Help',
    });
});

window.addEventListener('showModalGUI', event => {
    $('#modalGUI').modal('show');
});

window.addEventListener('closeModalGUI', event => {
    $('#modalGUI').modal('hide');
    $('#updatePrecoSugest').modal('hide');
});

window.addEventListener('closeModalAction', event => {
    $('#modalAction').modal('hide');
});

window.addEventListener('showModalAction', event => {
    $('#modalAction').modal('show');
});

window.addEventListener('closeModalLicitacao', event => {
    $('#ModalLicitacao').modal('hide').data('bs.modal', null);
    $('#ModalLicitacao').remove();
    $('.modal-backdrop').remove();
    $('body').removeClass('modal-open');
    $('body').removeAttr('style');
});

window.addEventListener('showModalLicitacao', event => {
    $('#ModalLicitacao').modal('show');
});

window.addEventListener('confirmation-ceasa-porta', event => {
    Swal.fire({
        title: event.detail.title,
        showDenyButton: true,
        icon: event.detail.type,
        confirmButtonText: 'Sim',
        denyButtonText: `Não`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            livewire.emit('existCeasa')
        } else if (result.isDenied) {
            livewire.emit('notFound')
        }
      });
});

