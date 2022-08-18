

<div>
    @include('livewire.create')
    @include('livewire.update')
    <table class="table table-bordered mt-5">
        <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
            <th>pass</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->password2 }}</td>
                <td>
                    <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $value->id }})" class="btn btn-primary btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm" wire:click="alertConfirm({{ $value->id }})">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


    @section('scripts')
        <script>

            window.livewire.on('actionSuccess', () => {
                $('#insertModal').modal('hide');
                $('#updateModal').modal('hide');
            });

            window.addEventListener('swal:modal', event => {
                Swal.fire({
                    title: event.detail.message,
                    text: event.detail.text,
                    icon: event.detail.type,
                });
            });


            window.addEventListener('swal:confirm', event => {
                Swal.fire({
                    title: event.detail.message,
                    text: event.detail.text,
                    icon: event.detail.type,
                    showCancelButton: true,
                    confirmButtonColor: '#d63030',
                    cancelButtonColor: '#aaa',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                })
                    .then((willDelete) => {
                        if (willDelete.value) {
                            @this.call('delete',event.detail.userId)
                        } else {
                            @this.call('alertCancel')
                        }
                    });
            });


        </script>
    @endsection

</div>


