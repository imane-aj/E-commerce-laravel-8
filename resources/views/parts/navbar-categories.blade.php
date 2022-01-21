<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('categories') }}">See all products</a>
          </li>
        @foreach (App\Models\Category::with("children")->where("cat_parent",0)->get(); as $cat) 
          <li class="nav-item dropdown">      
                <a class="nav-link dropdown-toggle" href="{{ route('category.products',  $cat->id) }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ $cat->name }}
              </a>
        
              
              <div class="dropdown-menu mega-menu" aria-labelledby="navbarDropdown">
                  <div class="row">
                      <div class="col-md-4">
                          <img src="{{ asset($cat->image) }}" class="img-fluid">
                      </div>
                      @foreach ($cat->children as $child)
                        <div class="col-md-4">
                          <h4>{{ $child->name }}</h4>   
                          @foreach ($child->children as $subchild_cat)
                                <p><a class="dropdown-item" href="{{ route('category.products',  $subchild_cat->id) }}">{{ $subchild_cat->name }}</a></p>
                          @endforeach    
                        </div>
                      @endforeach 
                  </div>
              </div>
              
          </li>
          
          @endforeach
  
        </ul>
      </div>
    </div>
  </nav>