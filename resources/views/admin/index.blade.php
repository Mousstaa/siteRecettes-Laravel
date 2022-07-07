@extends('/layouts/main')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

@yield('css')

{{-- crud --}}
<section style="padding-top:60px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Bonjour Chef!</h3>
                <div class="card">
                    @if(session()->has('info'))
                    <div class="alert alert-success" id="success-alert">
                        <button type="button" class="close" data-dismiss="alert">X</button>
                        {{ session('info') }}
                      </div>
                    @endif
                    <div class="card-header">
                       <h4 class="text-center">Liste des recettes publiées:</h4> <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#recipeModal"> Ajouter une nouvelle recette </a>
                    </div>
                    <div class="card-body">
                        <table id="recipeTable" class="table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Titre</th>
                                    <th style="width: 450px;">Contenu</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recipes as $recipe)
                                    <tr id="sid{{$recipe->id}}">
                                        <td><img src="{{asset('media')}}/{{$recipe->image}}" style="max-width:150px"/></td>
                                        <td>{{$recipe->title}}</td>
                                        <td>{{$recipe->content}}</td>
                                        <td  align="right">
                                            <a href="javascript:void(0)" onclick="editRecipe({{$recipe->id}})" class="btn btn-info">Modifier</a>
                                            <a href="javascript:void(0)" onclick="deleteRecipe({{$recipe->id}})" class="btn btn-danger">Supprimer</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- Pagination links --}}
                        <div align="center" class="d-flex justify-content-center">
                            {{$recipes->links("pagination::bootstrap-4")}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- Modald'ajout -->
  <div class="modal fade" id="recipeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter une nouvelle recette !</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="recipeForm" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                  <label for="title">Titre de la recette</label>
                  <input type="text"  id="title" name="title" required/>
              </div>
              <div class="form-group">
                  <label for="content">Contenu de la recette</label>
                  <input type="text" class="form-control" id="content" name="content" required/>
              </div>
              <div class="form-group">
                <label for="ingredients">Ingrédients de la recette</label>
                <input type="text" class="form-control" id="ingredients" name="ingredients" required/>
              </div>
              <div class="form-group">
                <label for="tags">Mot clés de la recette</label>
                <input type="text" class="form-control" id="tags" name="tags" required/>
              </div>
              <div class="form-group">
                <label for="image">La plus belle photo :)</label>
                <input type="file" name="image" class="form-control" id="image"/>
                <span style="display: none;" id="error_image">
                    <div class="alert alert-danger" role="start">Image requise</div>
                </span>
              </div>
              <button type="button" class="save_post_btn btn btn-primary">Ajouter</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal de modification -->
  <div class="modal fade" id="recipeEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modification de la recette !</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="recipeEditForm">
              @csrf
              <input type="hidden" id="id" name="id" />
              <div class="form-group">
                  <label for="title">Titre de la recette</label>
                  <input type="text" class="form-control" id="title2" name="title" required/>
              </div>
              <div class="form-group">
                  <label for="content">Contenu de la recette</label>
                  <input type="text" class="form-control" id="content2" name="content" required/>
              </div>
              <div class="form-group">
                <label for="ingredients">Ingrédients de la recette</label>
                <input type="text" class="form-control" id="ingredients2" name="ingredients" required/>
              </div>
              <div class="form-group">
                <label for="tags">Mot clés de la recette</label>
                <input type="text" class="form-control" id="tags2" name="tags" required/>
              </div>
              <button type="submit" class="btn btn-primary">Modifier</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  {{-- Fonction pour Ajouter une recette --}}
  <script>

    $('.save_post_btn').on('click', function(e){
    e.preventDefault();
    let myForm = document.getElementById('recipeForm');
    let formData = new FormData(myForm);
    $.ajaxSetup({
        headers: {
            'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
        }
    });
     $.ajax({
        type: "POST",
        data: formData,
        dataType: 'JSON',
        contentType: false,
        processData: false,
        url: "{{route('recipe.add')}}",
        success:function(response){
            if(response){
                $("#recipeTable tbody").prepend('<tr class="table-success"><td><img src="{{asset("media")}}/'+response.image+'" style="max-width:150px"/></td><td>'+ response.title +'</td><td>'+ response.content +'</td><td align="right"><a href="javascript:void(0)" onclick="editRecipe('+response.id+')" class="btn btn-info">Modifier</a><a href="javascript:void(0)" onclick="deleteRecipe('+response.id+'); window.location.reload();" class="btn btn-danger">Supprimer</a></td></tr>');
                $("#recipeForm")[0].reset();
                $("#recipeModal").modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                location.reload();
            }
        }
     })
    })

  </script>

{{-- Fonction pou modifiacation recette  --}}
  <script>

      function editRecipe(id){
          $.get('/admin/'+id,function(recipe){
              $("#id").val(recipe.id);
              $("#title2").val(recipe.title);
              $("#content2").val(recipe.content);
              $("#ingredients2").val(recipe.ingredients);
              $("#tags2").val(recipe.tags);
              $("#recipeEditModal").modal('toggle');
          });
      }

      $("#recipeEditForm").submit(function(e){
        e.preventDefault();
        let id = $("#id").val();
        let title = $("#title2").val();
        let content = $("#content2").val();
        let ingredients = $("#ingredients2").val();
        let tags = $("#tags2").val();
        let _token = $("input[name=_token]").val();

        $.ajax({
            url:"{{route('recipe.update')}}",
            type:"PUT",
            data:{
                id:id,
                title:title,
                content:content,
                ingredients:ingredients,
                tags:tags,
                _token:_token
            },
            success:function(response){
                $('#sid' + response.id + 'td:nth-child(1)').text(response.title);
                $('#sid' + response.id + 'td:nth-child(2)').text(response.content);
                $('#sid' + response.id + 'td:nth-child(3)').text(response.ingredients);
                $('#sid' + response.id + 'td:nth-child(4)').text(response.tags);

                $("#recipeTable tbody").prepend('<tr class="table-success"><td><img src="{{asset("media")}}/'+response.image+'" style="max-width:150px"/></td><td>'+ response.title +'</td><td>'+ response.content +'</td><td align="right"><a href="javascript:void(0)" onclick="editRecipe('+response.id+')" class="btn btn-info">Modifier</a><a href="javascript:void(0)" onclick="deleteRecipe('+response.id+'); window.location.reload();" class="btn btn-danger">Supprimer</a></td></tr>');

                $("#recipeEditModal").modal('toggle');
                //reset le formulaire
                $("#recipeEditForm")[0].reset();
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                location.reload();
            }
        });
      });
  </script>

  {{-- Fonction pour suppression de recette --}}
  <script>

      function deleteRecipe(id){

        if(confirm("Voulez-vous vraiment supprimer cette recette !")){
            $.ajax({
                url:'admin/'+id,
                type:'DELETE',
                data:{
                    _token : $("input[name=_token]").val()
                },
                success:function(response){
                    $("#sid"+id).remove();

                }
            });
        }
      }

  </script>

@endsection





