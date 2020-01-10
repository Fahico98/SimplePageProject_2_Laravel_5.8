
$(document).ready(function(){

   $(document).on("click", "#newMessageLink", function(event){
      event.preventDefault();
      $("#newMessageModalLabel").text("New message");
      $("#messageContent").val("");
      $("#recipientEmail").val("");
      $("#triggerNewMessageModalButton").trigger("click");
   });

   $(document).on("click", ".answerMessage", function(event){
      event.preventDefault();
      $("#newMessageModalLabel").text("Answer message");
      var id = $(this).attr("id");
      $("#messageContent").val("");
      $("#recipientEmail").val($("#" + id + ".messageActionRecipientEmail").val());
      $("#triggerNewMessageModalButton").trigger("click");
   });

   $(document).on("click", ".resendMessage", function(event){
      event.preventDefault();
      $("#newMessageModalLabel").text("Resend message");
      var id = $(this).attr("id");
      $("#recipientEmail").val("");
      $("#messageContent").val($("#" + id + ".messageActionContent").text());
      $("#triggerNewMessageModalButton").trigger("click");
   });

   $(document).on("click", ".deleteMessage", function(event){
      event.preventDefault();
      $("#messageToDeleteId").val($(this).attr("id"));
      $("#triggerDeleteMessageModalButton").trigger("click");
   });

   $(document).on("click", "#deleteMessageAction", function(){
      var messageId = $("#messageToDeleteId").val();
      deleteMessage(messageId);
   });
});

function deleteMessage(id){
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      url: "/user/message/delete?id=" + id,
      type: "GET",
      dataType: "html",
      processData: false,
      success: function(){
         $("#" + id + ".card").remove();
      },
      async: false
   });
}

