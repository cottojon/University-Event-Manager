
//check is any emails that are the same
function checkAnySameEmails(admin, student2, student3, student4, student5) {
    if (admin === student2 || admin === student3 || admin === student4 || admin === student5)
        return true;
    if (student2 === student3 || student2 === student4 || student2 === student5)
        return true;
    if (student3 === student4 || student3 === student5)
        return true;
    if (student4 === student5)
        return true;


    return false;
}


//jquery functions
$(function () {



    //card text limit
    $("p.card-text").text(function (index, currentText) {

        return currentText.substr(0, 90) + ' ...';
    });



    $('#loginButton').submit(function () {

        $.ajax({
            type: "POST",
            url: "loginUser.php",
            data: {
                username: $('#inputUsername').val(),
                password: $('#inputPassword').val()
            },
            success: function (msg) {
                // alert( "Data Saved: " + msg );
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                //display login alert
                $('#loginAlert').show();
            }
        });
    })

    //replace modal with innermodal clone when modal close btn is clicked
    $('#ModalContainer').on('hidden.bs.modal', function () {
        //hide modal
        // $('#innerModal').modal('hide');
        //remove innermodal
        $('#innerModal').detach();
        //append cloned modal to modal container
        $('#ModalContainer').append(clonedInnerModal);
        //get the clone inner modal again
        clonedInnerModal = $('#innerModal').clone(true);

    });


    //get all events for my events tab
    $('#myEvents-tab').on('click', function () {
        //send to backend 
        $.ajax({
            type: "GET",
            url: "getMyEvents.php",
            data: "data",
            success: function (events) {
                //detach out all child elements;
                $('#eventCardDeck').children().detach();

                var count = 0;

                //for each event make a card
                $.each(events, function (i, event) {
                    var html = "<div class='card h-100 mb-4'>  <div class='card-body'> <h5 class='card-title'>" + event.eventTitle + "</h5>" +
                        "<h6 class='card-subtitle mb-2 text-muted'>" + event.rsoHosting + "</h6>" +
                        "<p class='card-text'>" + event.eventDescription + "</p>" +
                        "<a class='eventMoreInfo' data-eventID=' " + event.eventID + " href='#' class='card-link'>More Info</a>" +
                        "<a class='eventUnfollow' data-eventID='" + event.eventID + "href='#' class='card-link'>Unfollow</a></div></div>";

                    //append the html inside the eventcarddeck
                    $('#eventCardDeck').append(html);

                    count++; //increment count
                    //for the responisve design
                    if (i === 2) {
                        //every two cards sm
                        $('#eventCardDeck').append('<div class="w-100 d-none d-sm-block d-md-none">');
                    }

                    if (i === 3) {
                        //every three cards md
                        $('#eventCardDeck').append('<div class="w-100 d-none d-md-block d-lg-none"');

                    }


                    if (i === 4) {
                        //every four cards lg
                        $('#eventCardDeck').append('<div class="w-100 d-none d-lg-block d-xl-none">');
                    }


                    if (i === 5) {
                        //every five cards XL
                        $('#eventCardDeck').append('<div class="w-100 d-none d-xl-block">');
                    }
                });



            },
            error: function () {
                //detach out all child elements;
                //$('#eventCardDeck').children().detach();
                alert("Server Failed To Retrieve Events");
            }
        });
    });




    //get all rsos for my rsos tab
    $('#myRSOs-tab').on('click', function () {
        //send to backend 
        $.ajax({
            type: "GET",
            url: "getMyRSOs.php",
            data: "data",
            success: function (rsos) {
                //detach out all child elements;
                $('#rsoCardDeck').children().detach();

                var count = 0; //count the amount of cards
                //for each event make a card
                $.each(rsos, function (i, rso) {

                    var html = "<div class='card h-100 mb-4'>  <div class='card-body'> <h5 class='card-title'>" + rso.rsoTitle + "</h5>" +
                        "<h6 class='card-subtitle mb-2 text-muted'>" + rso.rsoType + "</h6>" +
                        "<p class='card-text'>" + rso.rsoDescription + "</p>" +
                        "<a data-eventID=' " + rso.rsoID + " href='#' class='card-link'>More Info</a>" +
                        "<a data-eventID='" + rso.rsoID + "href='#' class='card-link'>Unfollow</a></div></div>";

                    //append the html inside the eventcarddeck
                    $('#rsoCardDeck').append(html);

                    count++; //increment card

                    //for the responisve design
                    if (count === 2) {
                        //every two cards sm
                        $('#rsoCardDeck').append('<div class="w-100 d-none d-sm-block d-md-none">');
                    }

                    if (count === 3) {
                        //every three cards md
                        $('#rsoCardDeck').append('<div class="w-100 d-none d-md-block d-lg-none"');

                    }


                    if (count === 4) {
                        //every four cards lg
                        $('#rsoCardDeck').append('<div class="w-100 d-none d-lg-block d-xl-none">');
                    }


                    if (count === 5) {
                        //every five cards XL
                        $('#rsoCardDeck').append('<div class="w-100 d-none d-xl-block">');
                    }


                });

            },
            error: function () {
                //detach out all child elements;
                // $('#rsoCardDeck').children().detach();
                alert("Server Failed To Retrieve RSOs");
            }
        });
    });


    //load eventpage
    //send eventID 
    //receive event info
    $('.eventMoreInfo').on('click', function () {
        //get event id
        var eventID = $(this).attr('data-eventID');

        //create object
        var obj = {
            "eventID": eventID
        };


        var jsonEventID = JSON.stringify(obj);


        //send event id
        $.ajax({
            type: "GET",
            url: "moreInfoEvent.php",
            data: jsonEventID,
            success: function () {
                //goto event page
                window.location.href = "eventPage.html";


                //update eventpage info


            },
            error: function () {

            }
        });


    });


    //create rso button click function
    $('#createRSOBtn').on('click', function (e) {
        console.log("in create rso function");

        e.preventDefault(); //stop automatic refreshing


        //get rso info
        var rsoTitle = $('#rsoTitle').val();
        var rsoDescription = $('#rsoDescription').val();
        var rsoType = $('#rsoType option:selected').text();
        var rsoUniversity = $('#university option:selected').text();
        var adminEmail = $('#adminEmail').val();
        var studemt2Email = $('#student2Email').val();
        var studemt3Email = $('#student3Email').val();
        var studemt4Email = $('#student4Email').val();
        var studemt5Email = $('#student5Email').val();



        //testing purposes
        console.log(rsoTitle);
        console.log(rsoDescription);
        console.log(rsoType);
        console.log(rsoUniversity);
        console.log(adminEmail);
        console.log(studemt2Email);
        console.log(studemt3Email);
        console.log(studemt4Email);
        console.log(studemt5Email);

        //check to see if all emails are different
        var emailFlag = checkAnySameEmails(adminEmail, studemt2Email, studemt3Email, studemt4Email, studemt5Email)
        console.log(emailFlag);

        //if true alert user and return
        if (emailFlag) {
            alert("Emails Must Be Different!");
            return;
        }


        //create json object
        var obj = {
            "rsoTitle": rsoTitle,
            "rsoDesription": rsoDescription,
            "rsoType": rsoType,
            "rsoUniversity": rsoUniversity,
            "adminEmail": adminEmail,
            "student2Email": studemt2Email,
            "student3Email": studemt3Email,
            "student4Email": studemt4Email,
            "student5Email": studemt5Email,
        };


        //stringify the object we can only send string in json format
        var jsonRSO = JSON.stringify(obj);

        //testing purposes
        console.log(jsonRSO);

        $.ajax({
            type: "POST", //type of request
            url: "createRSO.php", //send to this endpoint
            data: jsonRSO, //the json being sentr
            sucess: function (message) { //if successful do this, message will be json response from backend

            },
            error: function (message) { //if ajax request fails do this, message will be json response from backend
                alert(message);
            }
        });
    });;




    //create event button clicked function
    $('#createEventBtn').on('click', function (e) {
        e.preventDefault(); //stop automatic refreshing
        console.log("in create event function");


        //get event info
        var eventTitle = $('#eventTitle').val();
        var eventDescription = $('#eventDescription').val();
        var eventType = $('#eventType option:selected').text();
        var eventUniversity = $('#eventUniversity option:selected').text();
        var lengthOfEvent = $('#lengthOfEvent').val();
        var startTime = $('#startTime').val();
        var date = $('#dateOfEvent').val();
        var contactPhone = $('#contactPhone').val();
        var contactEmail = $('#contactEmail').val();
        var eventAddress = $('#eventAddress').val();
        var rsoName = $('#rsoName').val();


        //get marker lat and longitude
        var latitude = marker.position.lat();
        var longitude = marker.position.lng();


        //testing purposes view in  chrome/fireforx console if needed
        console.log(lengthOfEvent);
        console.log(startTime);
        console.log(eventTitle);
        console.log(eventDescription);
        console.log(eventType);
        console.log(eventUniversity);
        console.log(latitude);
        console.log(longitude);
        console.log(date);
        console.log(contactPhone);
        console.log(contactEmail);
        console.log(eventAddress);
        console.log(rsoName);
        

        //create json object
        var obj = {
            "eventTitle": eventTitle,
            "eventDesription": eventDescription,
            "eventType": eventType,
            "eventUniversity": eventUniversity,
            "eventLatitude": latitude,
            "eventLongitude": longitude,
            "lengthOfEvent": lengthOfEvent,
            "startTime": startTime,
            "date" : date,
            "contactPhone" : contactPhone,
            "contactEmail" : contactEmail,
            "eventAddress" : eventAddress,
            "rsoName" : rsoName
        };

        //stringify the object because we can only send string in json format
        var jsonRSO = JSON.stringify(obj);

        console.log(jsonRSO);


        $.ajax({
            type: "POST", //type of request
            url: "createevent.php", //send to this end point
            data: jsonRSO, //the json we are sending
            sucess: function (message) { //what happens if we are succesful, message will be json response from backend

            },
            error: function () { //what happens if the ajax request fails
                alert("Server Error");
            }
        });

    });




/* light need to do server side
    //rsoPage isUserAdmin to create Event ?
    $('#creatEventLink').load(function () {
        var data; //so you need userID?
        console.log($('#createEventLinK'));

        console.log("in here");

        $.ajax({
            type: "POST", //type of request
            url: "isUserAdmin.php", //send to this endpoint
            data: data, //the json being sentr
            sucess: function (message) { //if successful do this, message will be json response from backend
                //do nothing link is active by default
            },
            error: function (message) { //if ajax request fails do this, message will be json response from backend
                //remove link from DOM
                console.log($('#createEventLink').parent());
                // $('#createEventLink').parent().detach(); //detach link so it won't show up
                $('#createEventLink').parent().removeClass('active');
                $('#createEventLink').parent().addClass('disabled');

                alert("failure");
            }
        });
    });

*/


});//end of jquery function

