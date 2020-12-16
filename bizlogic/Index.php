<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exam</title>
    <script src= "https://unpkg.com/react@16/umd/react.production.min.js"></script>
    <script src= "https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
    <!-- Load Babel Compiler -->
    <script src="https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

</head>
<body>
<div id='root'></div>

<script  type="text/babel">


class ExamForm extends React.Component {
    state = {
        username: '',
        name: '',
        email: '',
      
       

    }

    handleFormSubmit( event ) {
        event.preventDefault();


        let formData = new FormData();
        formData.append('username', this.state.username)
        formData.append('name', this.state.name)
        formData.append('email', this.state.email)
        
        
        axios({
            method: 'post',
            url: '/db.php',
            data: formData,
            config: { headers: {'Content-Type': 'multipart/form-data' }}
        })
        .then(function (response) {
            //handle success
            console.log(response)

        })
        .catch(function (response) {
            //handle error
            console.log(response)
        });
    }

    render(){
        return (
        <form>
            <label>UserName</label>
            <input type="text" name="name" value={this.state.username}
                onChange={e => this.setState({ name: e.target.value })}/>

            <label>Name</label>
            <input type="text" name="name" value={this.state.name}
                onChange={e => this.setState({ name: e.target.value })}/>


            <label>Email</label>
            <input type="email" name="email" value={this.state.email}
                onChange={e => this.setState({ email: e.target.value })}/>

           
            <input type="submit" onClick={e => this.handleFormSubmit(e)} value="Create User" />
        </form>);
    }
}


class App extends React.Component {
componentDidMount() {
    const url = '/db.php'
    axios.get(url).then(response => response.data)
    .then((data) => {
      this.setState({ exam: data })
      console.log(this.state.exam)
     })
  }
  state = {
    exam: []
  }
  render() {
    return (
        <React.Fragment>
        <h1>Exam Management</h1>
        <table border='1' width='100%' >
        <tr>
            <th>UserName</th>
            <th>Name</th>
            <th>Email</th>
                 
        </tr>

        {this.state.contacts.map((contact) => (
        <tr>
            <td>{ contact.username }</td>
            <td>{ contact.name }</td>
            <td>{ contact.email }</td>
            
        </tr>
        form>
            <label>UserName</label>
            <input type="text" name="name" value={this.state.name}
                onChange={e => this.setState({ name: e.target.value })}/>

            <label>Name</label>
            <input type="text" name="name" value={this.state.username}
                onChange={e => this.setState({ name: e.target.value })}/>


            <label>Email</label>
            <input type="email" name="email" value={this.state.email}
                onChange={e => this.setState({ email: e.target.value })}/>

           
            <input type="submit" onClick={e => this.handleFormSubmit(e)} value="Create User" />
        </form>);
        ))}
        </table>
        </React.Fragment>
    );
  }
}

ReactDOM.render(<App />, document.getElementById('root'));
</script>
</body>   
</html>

