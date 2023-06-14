<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Product &raquo; <?php echo e($product->name); ?> &raquo; Gallery
        </h2>
     <?php $__env->endSlot(); ?>

     <?php $__env->slot('script', null, []); ?> 
        <script>
            $(document).ready(function() {
                // AJAX Datatable
                var dataTable = $('#crudTable').DataTable({
                    ajax: {
                        url: '<?php echo url()->current(); ?>'
                    },
                    columns: [{
                            data: 'id',
                            name: 'id',
                            width: '5%'
                        },
                        {
                            data: 'url',
                            name: 'url'
                        },
                        {
                            data: 'is_featured',
                            name: 'is_featured'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false,
                            width: '25%'
                        },
                    ]
                });
            });
        </script>

     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="<?php echo e(route('dashboard.product.gallery.create', $product->id)); ?>"
                    class="text-white bg-green-500 hover:bg-green-700 font-bold py-2 px-4 rounded shadow-lg">
                    + Upload Photos
                </a>
            </div>
            <div class="shadow overflow-hidden sm-rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Featured</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /home/rammkanaeru/laravel/youtube-ustadz/luxspace/resources/views/pages/dashboard/gallery/index.blade.php ENDPATH**/ ?>