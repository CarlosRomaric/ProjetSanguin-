@extends('layouts/backend')

@section('extra-css')
    <!-- Data Table CSS -->
    <link href="/assets-backend/vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets-backend/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <!--<div class="container">
        <a href="{{ route('backend') }}" class="btn btn-primary my-3">Retour</a>
        <div class="row justify-content-center mt-5">
          
          <div class="col-md-10">
            <div class="card">
              <div class="card-header text-center">
                    <h4 class="text-uppercase">Liste des Membres Inscrits</h4>
              </div>
              <div class="card-body">
                 <div class="table-responsive"> 
                        <table class="table table-bordered " id="example2">
                            <thead>
                                <tr>
                                    <th>Nom & Prénoms</th>
                                    <th>Genre</th>
                                    <th>Date de naissance</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Groupe Sanguin</th>
                                    <th>Commune</th>
                                    <th>Niveau de fiabilité</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($members as $member)
                                <tr>
                                    <td>{{ $member->first_name }} {{ $member->name }}</td>
                                    <td>
                                        @if($member->sex == 'M')
                                            Masculin
                                        @else
                                            Feminin
                                        @endif
                                    </td>
                                    <td>{{ $member->date_birth }}</td>
                                    <td>{{ $member->email }}</td>
                                    <td>{{ $member->phone }}</td>
                                    <td>{{ $member->groupeSanguin }}</td>
                                    <td>{{ $member->common }}</td>
                                    <td></td>
                                </tr>
                             @endforeach
                            </tbody>
                        </table>
                 </div>
              </div>
            </div>
          </div>
        </div>
    </div>-->

    <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Liste des membres inscrits</h5>
                           
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <table id="example2" class="table table-hover w-100 display pb-30 dataTable dtr-inline" role="grid" aria-describedby="datable_1_info">
                                            <thead>
                                                <tr role="row">
                                                    <!--<th class="sorting_asc" tabindex="0" aria-controls="datable_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datable_1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Position</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datable_1" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Office</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datable_1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Age</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datable_1" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">Start date</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datable_1" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">Salary</th>-->
                                                    <th>Nom & Prénoms</th>
                                                    <th>Genre</th>
                                                    <th>Date de naissance</th>
                                                    <th>Email</th>
                                                    <th>Téléphone</th>
                                                    <th>Groupe Sanguin</th>
                                                    <th>Commune</th>
                                                    <th>Niveau de fiabilité</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                              @foreach($members as $member)                                          
                                                <tr role="row" class="odd">
                                                    <td tabindex="0" class="sorting_1">{{ $member->first_name }} {{ $member->name }}</td>
                                                     <td>
                                                        @if($member->sex == 'M')
                                                            Masculin
                                                        @else
                                                            Feminin
                                                        @endif
                                                    </td>
                                                    <td>{{ $member->date_birth }}</td>
                                                    <td>{{ $member->email }}</td>
                                                    <td>{{ $member->phone }}</td>
                                                    <td>{{ $member->groupeSanguin }}</td>
                                                    <td>{{ $member->common }}</td>
                                                    <td></td>
                                                </tr>
                                              @endforeach  
                                            </tbody>
                                            <tfoot>
                                                <!--<tr>
                                                    <th rowspan="1" colspan="1">Name</th>
                                                    <th rowspan="1" colspan="1">Position</th>
                                                    <th rowspan="1" colspan="1">Office</th>
                                                    <th rowspan="1" colspan="1">Age</th>
                                                    <th rowspan="1" colspan="1">Start date</th>
                                                    <th rowspan="1" colspan="1">Salary</th>
                                                </tr>-->
                                                <tr>
                                                    <th>Nom & Prénoms</th>
                                                    <th>Genre</th>
                                                    <th>Date de naissance</th>
                                                    <th>Email</th>
                                                    <th>Téléphone</th>
                                                    <th>Groupe Sanguin</th>
                                                    <th>Commune</th>
                                                    <th>Niveau de fiabilité</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>
                       
                    </div>
                </div>

@endsection

@section('extra-js')
   
    <!-- Data Table JavaScript -->
    <script src="/assets-backend/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/assets-backend/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets-backend/vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="/assets-backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/assets-backend/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="/assets-backend/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/assets-backend/vendors/jszip/dist/jszip.min.js"></script>
    <script src="/assets-backend/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/assets-backend/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="/assets-backend/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/assets-backend/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/assets-backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets-backend/dist/js/dataTables-data.js"></script>

    <script>
            $(document).ready(function() {
               
                $("#example1").DataTable();
                $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "language": {
                        processing:     "Traitement en cours...",
                        search:         "Rechercher&nbsp;:",
                        lengthMenu:     "Afficher _MENU_ &eacute;l&eacute;ments",
                        info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                        infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                        infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                        infoPostFix:    "",
                        loadingRecords: "Chargement en cours...",
                        zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                        emptyTable:     "Aucune donnée disponible dans le tableau",
                        paginate: {
                            first:      "Premier",
                            previous:   "Pr&eacute;c&eacute;dent",
                            next:       "Suivant",
                            last:       "Dernier"
                        },
                        aria: {
                            sortAscending:  ": activer pour trier la colonne par ordre croissant",
                            sortDescending: ": activer pour trier la colonne par ordre décroissant"
                        }
                    }
                });
                
            });

    </script>
@endsection