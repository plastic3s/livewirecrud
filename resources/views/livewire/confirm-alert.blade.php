<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

    <!-- resources/views/livewire/confirm-alert.blade.php -->

        <div>
            <button class="btn btn-danger btn-sm" wire:click="$emit('triggerDelete',{{ $userId }})">
                Delete
            </button>
        </div>

        @push('scripts')
            <script type="text/javascript">
                document.addEventListener('DOMContentLoaded', function () {
                @this.on('triggerDelete', userId => {
                    Swal.fire({
                        title: 'Are You Sure?',
                        text: 'User record will be deleted!',
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#aaa',
                        confirmButtonText: 'Delete!'
                    }).then((result) => {
                        //if user clicks on delete
                        if (result.value) {
                            // calling destroy method to delete
                        @this.call('destroy',userId)
                            // success response
                            Swal.fire({title: 'Contact deleted successfully!', icon: 'success'});
                        } else {
                            Swal.fire({
                                title: 'Operation Cancelled!',
                                icon: 'success'
                            });
                        }
                    });
                });
                })
            </script>
        @endpush
</div>
