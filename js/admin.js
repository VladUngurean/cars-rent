function HTMLforManagersAndCouriers(user) {
  return `
    <input id="delete${user.email}" class="button" name="deleteUser" type="submit" value="${user.email}" style="display: none;"/>
    <label class="delete-user-button" for="delete${user.email}">
      Delete
    </label>
    <tr>
      <td>${user.userRole}</td>
      <td>${user.firstName}</td>
      <td>${user.lastName}</td>
      <td>${user.phone}</td>
      <td>${user.email}</td>
    </tr>
  `;
}

const allManagersAndCouriers = managersAndCouriersData;
console.log(allManagersAndCouriers);
const forRenderTableRows = document.getElementById("managesAndCouriersInfoTable");
if (allManagersAndCouriers === "") {
  forRenderTableRows.insertAdjacentHTML("beforeend", "No users in Data Base");
} else {
  renderTableRows(allManagersAndCouriers, forRenderTableRows, HTMLforManagersAndCouriers);
}

function renderTableRows(infoAboutCar, container, functionThatReturnHTML) {
  infoAboutCar.forEach((type) => {
    const HTMLtoRender = functionThatReturnHTML(type);
    container.insertAdjacentHTML("beforeend", HTMLtoRender);
  });
}

document.querySelectorAll('.delete-user-button').forEach(e => {
  e.addEventListener('click', function(event) {
    let confirmation = confirm('Are you sure you want to delete this user?');
    if (confirmation) {
    } else {
      event.preventDefault();
    }
  })
})