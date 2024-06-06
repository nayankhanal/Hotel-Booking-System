let allFloorRooms = [];
let allFloorRoomsIds = []
let allClassRooms = [];
let allClassRoomsIds = []
let allClassAndFloorRoomsIds = []

let actualRoomsToBeSelected;
let selectedRoomValue;

let totalAmount = 0;


// --------------------------------------FOR FLOOR SELECTION--------------------------
const floors = document.querySelectorAll('#getrooms')

let previousClikedElement;
let previousRoomBasePrice = 0;
let previousAddonBasePrice = 0;
let previousServiceCharge = 0;

floors.forEach(floor => {
    floor.addEventListener('click', async function(e) {
        e.preventDefault()
        const clikedElement = e.target

        if (previousClikedElement) {
            previousClikedElement.setAttribute('class', 'btn btn-outline-success btn-block')
        }

        clikedElement.setAttribute('class', 'btn btn-success btn-block')
        previousClikedElement = clikedElement

        const floor = e.target.value

        try {
            await fetch(`/rooms/${floor}`)
                .then(res => res.json())
                .then(floorRooms => {
                    allFloorRooms = []
                    allClassRooms = []
                    allFloorRoomsIds = []
                    allClassRoomsIds = []
                    allFloorRooms = floorRooms

                    const rooms = document.getElementById('rooms')
                    rooms.innerHTML = ''

                    //repeatation
                    if (allClassRooms) {
                        allClassRooms.forEach(classRoom => {
                            allClassRoomsIds.push(classRoom.id)
                        });
                    }


                    floorRooms.forEach(floorRoom => {
                        allFloorRoomsIds.push(floorRoom.id)
                    });

                    function intersection(allClassRoomsIds, allFloorRoomsIds) {
                        return allClassRoomsIds.filter(classRoom => allFloorRoomsIds.includes(classRoom));
                    }

                    classSelected = document.getElementById('roomClass')
                    if (classSelected.selectedIndex > 0) {
                        allClassAndFloorRoomsIds = intersection(allClassRoomsIds, allFloorRoomsIds)
                    } else {
                        allClassAndFloorRoomsIds = allFloorRoomsIds
                    }


                    let previousSelectedRoom;
                    // let previousBasePrice = 0;
                    allClassAndFloorRoomsIds.forEach(async roomId => {
                        const div = document.createElement('div')
                        div.setAttribute('class', 'col')

                        const button = document.createElement('button')
                        await fetch(`/rooms/room/${roomId}`)
                            .then(res => res.json())
                            .then(async room => {
                                await fetch(`/room/status/${room.room_status_id}`)
                                    .then(res => res.json())
                                    .then(status => {
                                        if (status === 'Available') {
                                            button.setAttribute('class', 'btn btn-outline-success btn-circle')
                                        } else {
                                            button.setAttribute('class', 'btn btn-danger btn-circle')
                                            button.disabled = true
                                        }
                                    })
                                    .catch(err => console.log(err))

                                button.setAttribute('value', room.id)
                                button.setAttribute('id', 'room-selection')
                                button.innerHTML = room.room_number

                                div.appendChild(button)
                                rooms.appendChild(div)

                                button.addEventListener('click', function(e) {
                                    e.preventDefault()
                                    fetch(`/rooms/room/${e.target.value}`)
                                        .then(res => res.json())
                                        .then(room => {
                                            if (previousSelectedRoom) {
                                                previousSelectedRoom.setAttribute('class', 'btn btn-outline-success btn-circle')
                                            }
                                            let selectedRoom = e.target
                                            selectedRoomValue = e.target.value
                                            selectedRoom.setAttribute('class', 'btn btn-success btn-circle')
                                            previousSelectedRoom = selectedRoom
                                            fetch(`/class/${room.room_class_id}`)
                                                .then(res => res.json())
                                                .then(roomClass => {
                                                    // console.log("base price: " + roomClass.base_price);
                                                    // console.log("previous base price: " + previousRoomBasePrice);
                                                    if (previousRoomBasePrice) {
                                                        totalAmount = totalAmount - previousRoomBasePrice
                                                    }
                                                    let basePrice = roomClass.base_price
                                                    totalAmount = parseFloat(totalAmount) + parseFloat(basePrice)
                                                    previousRoomBasePrice = basePrice
                                                    const totalBill = document.getElementById("booking-amount")
                                                    totalBill.innerHTML = `Rs.${totalAmount}`
                                                })
                                        })
                                        .catch(err => {
                                            console.log(err);
                                        })
                                })
                            })
                    });
                })
                .catch(err => { console.log(err) })
        } catch (error) {
            console.log(error)
        }

    })
});

// -----------------------------------FOR CLASS SELECTION---------------------------------------


const roomClass = document.getElementById('roomClass')
roomClass.addEventListener('change', async function(e) {
    const selectedClass = e.target.value
    if (selectedClass) {
        await fetch(`/rooms/class/${selectedClass}`)
            .then(res => res.json())
            .then(classRooms => {
                allClassRooms = []
                allClassRoomsIds = []

                allClassRooms = classRooms

                classRooms.forEach(classRoom => {
                    allClassRoomsIds.push(classRoom.id)
                });

                if (allFloorRooms) {
                    allFloorRooms.forEach(floorRoom => {
                        allFloorRoomsIds.push(floorRoom.id)
                    });
                }

                function intersection(allClassRoomsIds, allFloorRoomsIds) {
                    return allClassRoomsIds.filter(classRoom => allFloorRoomsIds.includes(classRoom));
                }

                allClassAndFloorRoomsIds = intersection(allClassRoomsIds, allFloorRoomsIds)

                const rooms = document.getElementById('rooms')
                rooms.innerHTML = ''

                let previousSelectedRoom;
                allClassAndFloorRoomsIds.forEach(async roomId => {
                    const div = document.createElement('div')
                    div.setAttribute('class', 'col')

                    const button = document.createElement('button')
                    await fetch(`/rooms/room/${roomId}`)
                        .then(res => res.json())
                        .then(async room => {
                            await fetch(`/room/status/${room.room_status_id}`)
                                .then(res => res.json())
                                .then(status => {
                                    if (status === 'Available') {
                                        button.setAttribute('class', 'btn btn-outline-success btn-circle')
                                    } else {
                                        button.setAttribute('class', 'btn btn-danger btn-circle')
                                        button.disabled = true
                                    }
                                })
                                .catch(err => console.log(err))

                            button.setAttribute('value', room.id)
                            button.setAttribute('id', 'room-selection')
                            button.innerHTML = room.room_number

                            div.appendChild(button)
                            rooms.appendChild(div)

                            button.addEventListener('click', function(e) {
                                e.preventDefault()
                                fetch(`/rooms/room/${e.target.value}`)
                                    .then(res => res.json())
                                    .then(room => {
                                        if (previousSelectedRoom) {
                                            previousSelectedRoom.setAttribute('class', 'btn btn-outline-success btn-circle')
                                        }
                                        let selectedRoom = e.target
                                        selectedRoomValue = e.target.value
                                        selectedRoom.setAttribute('class', 'btn btn-success btn-circle')
                                        previousSelectedRoom = selectedRoom
                                        fetch(`/class/${room.room_class_id}`)
                                            .then(res => res.json())
                                            .then(roomClass => {
                                                if (previousRoomBasePrice) {
                                                    totalAmount = totalAmount - previousRoomBasePrice
                                                }
                                                let basePrice = roomClass.base_price
                                                totalAmount = parseFloat(totalAmount) + parseFloat(basePrice)
                                                previousRoomBasePrice = basePrice
                                                const totalBill = document.getElementById("booking-amount")
                                                totalBill.innerHTML = `Rs.${totalAmount}`
                                            })
                                    })
                                    .catch(err => {
                                        console.log(err);
                                    })
                            })
                        })
                });

            })
            .catch(err => {
                console.log(err);
            })
    } else {

    }
})


//------------------------------FOR ADDONS------------------------------
const addons = document.getElementById('addons')
addons.addEventListener('change', async function(e) {
    e.preventDefault()
    await fetch(`/addon/${e.target.value}`)
        .then(res => res.json())
        .then(addon => {
            console.log(addon.price);
            if (previousAddonBasePrice) {
                totalAmount = totalAmount - previousAddonBasePrice
            }
            totalAmount = parseFloat(totalAmount) + parseFloat(addon.price)
            const totalBill = document.getElementById("booking-amount")
            totalBill.innerHTML = `Rs.${totalAmount}`
            previousAddonBasePrice = addon.price
        })
})


//-----------------------------FOR BOOKING AMOUNT------------------------
const serviceCharge = document.getElementById('serviceCharge')
serviceCharge.addEventListener('input', function(e) {
    e.preventDefault()
    console.log(e.target.value);
    if (previousServiceCharge) {
        totalAmount = parseFloat(totalAmount) - parseFloat(previousServiceCharge)
    }
    let currentServiceCharge = e.target.value || 0
    totalAmount = parseFloat(totalAmount) + parseFloat(currentServiceCharge)
    const totalBill = document.getElementById("booking-amount")
    totalBill.innerHTML = `Rs.${totalAmount}`
    previousServiceCharge = currentServiceCharge
})



//------------------------------FOR SUBMIT-------------------------------

const book = document.getElementById('book-room')

book.addEventListener('click', async function(e) {
    e.preventDefault()

    const firstName = document.getElementById('firstName').value
    const lastName = document.getElementById('lastName').value
    const email = document.getElementById('email').value
    const numberOfChildren = document.getElementById('numberOfChildren').value
    const numberOfAdults = document.getElementById('numberOfAdults').value
    const contactNumber = document.getElementById('contactNumber').value
    const addon = document.getElementById('addons').value
    const checkinDate = document.getElementById('checkinDate').value
    const checkOutDate = document.getElementById('checkoutDate').value
        // const bookedAmount = document.getElementById('serviceCharge').value
    const paymentStatus = document.getElementById('paymentStatus').value

    bookingData = {
        first_name: firstName,
        last_name: lastName,
        email_address: email,
        contact_number: contactNumber,
        num_children: numberOfChildren,
        num_adults: numberOfAdults,
        room_id: selectedRoomValue,
        addon_id: addon,
        checkin_date: checkinDate,
        checkout_date: checkOutDate,
        payement_status: paymentStatus,
        booking_amount: totalAmount
    }

    try {
        await fetch('/bookings', {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(bookingData)
            })
            .then((res => res.json()))
            .then(msg => {
                console.log(msg);
            })
    } catch (error) {
        console.log(error);
    }

})