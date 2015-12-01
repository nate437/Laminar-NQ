//PAGE HEADER
//Constructs a  dynamic header.
//REQUIRED: title<String>, subTitle<String>
//OPTIONAL: imgSrc<String[URL]>

var Header = React.createClass({
	render: function() {
		var bgImg= {backgroundImage: "url(" + this.props.imgSrc + ")"};
		if(this.props.imgSrc) {
			return (
				<div className="NQ-header">
					<div className="header-image" style={bgImg} />
					<div className="header-container">
						<div className="header-title">
							{this.props.title}
						</div>
						<div className="header-sub-title">
							{this.props.subTitle}
						</div>
					</div>
				</div>
			);
		}
		else {
			return (
				<div className="NQ-header">
					<div className="header-container">
						<div className="header-title">
							{this.props.title}
						</div>
						<div className="header-sub-title">
							{this.props.subTitle}
						</div>
					</div>
				</div>
			);
		}
	}
});

//SAVE BUTTON
//Constructs a togglable save button
//REQUIRED saved<Boolean>
var SaveButton = React.createClass({
	getInitialState: function() {
    return {saved: this.props.saved};
  },
  handleClick: function(event) {
    this.setState({saved: !this.state.saved});
  },
	render: function(){
		var icon = this.state.saved ? 'icon-check' : 'icon-plus';
    return (
      <i onClick={this.handleClick} className={icon}>
      </i>
		);
	}
});

//POPOVER MENU
//Constructs an interactive popover menu
//REQUIRED options<MenuObject>

var PopMenu = React.createClass({
	getInitialState: function() {
		return {open: false};
	},
	handleClick: function(event) {
		this.setState({open: !this.state.open});
	},
	render: function() {

		var menuItems = eval(this.props.options).map(function (item) {
			var itemStyle = {backgroundColor: item.color};
			return(
				<div className="menu-item" style={itemStyle}>
				<i className={item.icon}></i>
				<div className="item-text">{item.text}</div>
				</div>
			);
		});

    return(
			<div className="slide-menu">
				<div className={(this.state.open ? " open" : "") + " NQ-popmenu-container"}>
					{menuItems}
					<div onClick={this.handleClick} className="menu-item" style={{backgroundColor: "#34363B"}}>
					  <i className="icon-cancel"></i>
					  <div className="item-text">cancel</div>
					</div>
				</div>
				<i onClick={this.handleClick} className="icon-dots"></i>
			</div>
		);
	}
});


//PLAYLIST
//Constructs a playlist from a given Spotify REST endpoint.
//REQUIRED: url<String[URL]>

var Playlist = React.createClass({

    getInitialState: function() {
      return {data: []};
    },
    componentDidMount: function() {

      $.ajax({
        url: this.props.url,
        dataType: 'json',
        cache: false,
        headers: {Authorization: "Bearer " + getUrlParameter('code')},
        success: function(data) {
          this.setState({data: data.items});
        }.bind(this),
        error: function(xhr, status, err) {
          console.error(this.props.url, status, err.toString());
        }.bind(this)
      });
    },
    render: function() {

      var playlistItems = this.state.data.map(function (item) {
        return (
          <tr>
					<td><SaveButton/></td>
          <td>{item.track.name}</td>
          <td>{item.track.artists[0].name}</td>
          <td className="hide-small">{Math.floor((item.track.duration_ms / 1000) / 60) + ":" + ("00" + Math.floor((item.track.duration_ms / 1000) % 60)).substr(-2,2)}</td>
          <td><PopMenu options="{[{text: 'artist', icon: 'icon-person', color: '#2ebd59'},{text: 'album', icon: 'icon-disc', color: '#26ADC4'},{text: 'delete', icon: 'icon-trash', color: '#CA3645'}]}" /></td>
          </tr>
        );
      });

      return (
        <table className="u-full-width playlist">
          <thead>
            <tr>
						  <th></th>
              <th>Track</th>
              <th>Artist</th>
              <th className="hide-small">Duration</th>
              <th></th>

            </tr>
            {playlistItems}
          </thead>
        </table>
      );
    }
});

//BUTTON SET
//Constructs a set of buttons to execute master actions.
//REQUIRED: buttons<ButtonObject>

var ButtonSet = React.createClass({

  render: function() {
    var buttonItems = eval(this.props.buttons).map(function (item) {
      return (
        <div className="action-button">{item.text}</div>
      );
    });

    return(
      <div className="NQ-button-container">
      {buttonItems}
      </div>
    );
  }
});

//QUEUE ITEM
//Constructs a queue item with photo, title, subtitle, and occupation indicator.
//REQUIRED: title<String>, subTitle<String>, participants<Integer>, imgSrc<String[URL]>

var QueueItem = React.createClass({
	render: function() {
		var bgImg= {backgroundImage: "url(" + this.props.imgSrc + ")"};
		return(
			<div className="NQ-queue-item">
			  <div className="queue-image-group">
					<div className="queue-image" style={bgImg}></div>
					<div className="queue-pop">{this.props.participants} </div>
				</div>
				<div className="queue-title-group">
					<div className="queue-title">{this.props.title}</div>
					<div className="queue-subtitle">{this.props.subTitle}</div>
				</div>
				<PopMenu options="{[{text: 'code', icon: 'icon-qrcode', color: '#2ebd59'},{text: 'delete', icon: 'icon-trash', color: '#CA3645'}]}" />
			</div>
		);
	}
});

//QUEUE LIST
//Constructs a set of queue items with title.
//REQUIRED: header<String>, queues<QueueObject>
var QueueList = React.createClass({
	render: function() {
		var queueItems = eval(this.props.queues).map(function (item) {
			return(
				<QueueItem title={item.title} subTitle={item.subTitle} imgSrc={item.imgSrc} participants={item.participants}/>
			);
		});

	  return(
			<div className="NQ-queue-group">
			<div className="queue-group-header">{this.props.header}</div>
			<div className="queues-container">
			  {queueItems}
			</div>
			</div>
		);
	}
});
