
var roleSelector = $("#roleSelector");
var searchName = $("#searchName");
var pagination = $("#ulPagination");
var crud = $("#crudBody");
var prevPage = $(".prev-page");
var nextPage = $(".next-page");
var selectedPage = $(".selected-page");
var pageLink = $(".page-change-link");

$(document).ready(function(){

   searchUsers(roleSelector.val());

   searchName.on("keyup", function(){
      searchUsers(roleSelector.val(), searchName.val());
   });

   roleSelector.on("change", function(){
      searchName.val("");
      searchUsers(roleSelector.val());
   });

   pageLink.on("click", function(event){
      event.preventDefault();
      console.log("->" + $(this).attr("id"));
   });

});

function searchUsers(role, searchName = "", currentPage = 1){
   var url = (searchName === "") ?
      "/user_search?role=" + role :
      "/user_search?role=" + role + "&searchName=" + searchName;

   url += "&currentPage=" + currentPage;
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      url: url,
      type: "GET",
      dataType: "JSON",
      processData: false,
      success: function(response){
         crud.empty();
         $.each(response.users, function(key, value){
            crud.append(
               "<tr>" +
                  "<th scope='row'>" + value.name + "</th>" +
                  "<td>" + value.lastname + "</td>" +
                  "<td>" + value.phone_number + "</td>" +
                  "<td>" + value.e_mail + "</td>" +
               "</tr>"
            );
         });
         addPagination(response.totalPages, currentPage);
      }
   });
}

function addPagination(totalPages, currentPage){
   pagination.empty();
   if(currentPage === 1){
      pagination.append(
         "<li class='page-item disabled'>" +
            "<a class='page-link' href='#' tabindex='-1' aria-disabled='true'>Previous</a>" +
         "</li>"
      );
   }else{
      pagination.append(
         "<li class='page-item'>" +
            "<a class='page-link prev-page' href='#'>Previous</a>" +
         "</li>"
      );
   }
   for(var i = 1; i <= totalPages; i++){
      if(i === currentPage){
         pagination.append(
            "<li class='page-item active' aria-current='page'>" +
               "<span class='page-link selected-page' id='" + i + "'>" + i + "<span class='sr-only'>(current)</span></span>" +
            "</li>"
         );
      }else{
         pagination.append(
            "<li class='page-item page-change-link'>" +
               "<a class='page-link' href='#' id='" + i + "'>" + i + "</a>" +
            "</li>"
         );
      }
   }
   if(currentPage === totalPages){
      pagination.append(
         "<li class='page-item disabled'>" +
            "<a class='page-link' href='#' tabindex='-1' aria-disabled='true'>Next</a>" +
         "</li>"
      );
   }else{
      pagination.append(
         "<li class='page-item'>" +
            "<a class='page-link next-page' href='#'>Next</a>" +
         "</li>"
      );
   }
}
