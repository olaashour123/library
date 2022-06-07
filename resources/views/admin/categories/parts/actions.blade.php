<a href="{{route('admin.categories.edit', $info->id)}}" class="btn btn-info">
    <i class="fas fa-edit"></i>
  </a>
{{-- 
  <button type="button" onclick="deleteItem('{{$info->id}}')" class="btn btn-danger">
    <i class="fas fa-trash"></i>
  </button> --}}

  
  <button type="button" data_url="{{route('admin.categories.destroy', ['id' => $info->id])}}" class="btn btn-danger deletebtn">
    <i class="fas fa-trash "></i>
  </button>