import './bootstrap';
import 'preline'
import Sortable from 'sortablejs';
window.Sortable = Sortable;

Livewire.on('track-event', (data) => {

    if (window.dataLayer) {
        dataLayer.push({
            event: data.name,
            ...data.params
        });
    }
});
