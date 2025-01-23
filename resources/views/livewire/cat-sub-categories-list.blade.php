<div>
    <div class="row">
        <div class="col-md-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                  <div class="pull-left">
                    <h4 class="h4 text-blue">Categories</h4>

                  </div>
                  <div class="pull-right">
                    <a href="{{  route('admin.category.add-category') }}" class="btn btn-primary btn-sm" type="button">
                        <i class="fa fa-plus"></i>
                        Add Category
                    </a>
                  </div>
                </div>
                <div class="table-responsive mt-4">
                     <table class="table table-borderless table-striped">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th>
                                    Category image
                                </th>
                                <th>Category Name</th>
                                <th>N. of sub categories</th>
                                <th>actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0" id="sortable_categories">
                            @forelse ($categories as $category )
                            <tr data-index="{{$category->id}}" data-ordering="{{$category->ordering}}">
                                <td>
                                    <div class="avatar mr-2">
                                        <img src="/images/categories/{{$category->category_image}}" width="50" height="50"  alt="">
                                    </div>
                                </td>
                                <td>{{ $category->category_name }}</td>
                                <td>
                                    {{ $category->subcategories->count() }}
                                </td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('admin.category.edit-category',$category->id) }}" class="text-primary">
                                            <i class="dw dw-edit-2"></i>
                                        </a>
                                        <a href="javaScript:;" class="text-danger deleteCategory" data-id="{{ $category->id }}">
                                            <i class="dw dw-delete-2"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <span class="text-danger">no catgory found</span>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                     </table>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                  <div class="pull-left">
                    <h4 class="h4 text-blue">Sub Categories</h4>

                  </div>
                  <div class="pull-right">
                    <a href="{{ route('admin.category.add-subcategory') }}" class="btn btn-primary btn-sm" type="button">
                        <i class="fa fa-plus"></i>
                        Add Sub Category
                    </a>
                  </div>
                </div>
                <div class="table-responsive mt-4">
                     <table class="table table-borderless table-striped">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th>
                                    Sub Category Name
                                </th>
                                <th>Category Name</th>
                                <th>Child SubCategory Name</th>
                                <th>actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0" id="subcategories_sortable">
                            @forelse($subcategories as $subcategory)
                            <tr data-index="{{ $subcategory->id }}" data-ordering="{{$subcategory->ordering}}">
                                <td>
                                    {{$subcategory->subcategory_name}}
                                </td>
                                <td>
                                    {{ $subcategory->category->category_name }}
                                </td>
                                <td>
                                    @if ($subcategory->childSubCategory->count() > 0)
                                        <ul class="list-group" id="child_subcategories_sortable">
                                            @foreach ($subcategory->childSubCategory as $item)
                                                <li class="d-flex justify-content-between align-items-center" data-index="{{$item->id}}" data-ordering="{{$item->ordering}}">
                                                    {{ $item->subcategory_name }}
                                                    <div>
                                                        <a href="{{ route('admin.category.edit-subcategory',['id'=>$item->id]) }}" class="text-primary" data-toggle="tooltip" title="Edit child subcategory name">
                                                            Edit
                                                        </a>
                                                        |
                                                        <a href="#" class="text-danger" data-toggle="tooltip" title="Delete child subcategory name">
                                                            Delete
                                                        </a>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <span>None</span>
                                    @endif
                                </td>

                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('admin.category.edit-subcategory',['id'=>$subcategory->id]) }}" class="text-primary">
                                            <i class="dw dw-edit-2"></i>
                                        </a>

                                        <a href="" class="text-danger">
                                            <i class="dw dw-delete-2"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <td colspan="4">
                                <span class="text">No sub Category Found</span>
                            </td>

                            @endforelse

                        </tbody>

                     </table>
                </div>
            </div>
        </div>
       </div></div>
