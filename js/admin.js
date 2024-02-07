function HTMLforManagersAndCouriers(user) {
    return `
    <input id="delete${user.email}" class="button" name="deleteUser" type="submit" value="${user.email}" style="display: none;"/>
    <label for="delete${user.email}">Delete User</label>
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