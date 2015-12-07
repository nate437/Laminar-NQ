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
	handleChildClick: function(data, evt){
		data.func();
	},
	render: function() {

		var menuItems = eval(this.props.options).map(function (item) {
			var itemStyle = {backgroundColor: item.color};
			return(
				<div onClick={this.handleChildClick.bind(null,item)} className="menu-item" style={itemStyle}>
				<i className={item.icon}></i>
				<div className="item-text">{item.text}</div>
				</div>
			);
		}.bind(this));

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
		refresh: function() {
			$.ajax({
				url: this.props.url,
				dataType: 'json',
				cache: false,
				success: function(data) {
					this.setState({data: data.items});
				}.bind(this),
				error: function(xhr, status, err) {
					console.error(xhr, status, err.toString());
				}.bind(this)
			});
		},
    componentDidMount: function() {
			this.refresh();
			setInterval(this.refresh, 10000);
    },

    render: function() {

      var playlistItems = this.state.data == [] ? "There's nothing here yet." : this.state.data.map(function (item) {
        return (
          <tr>
					<td><SaveButton saved={item.track.saved}/></td>
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
					</thead>
					<tbody>
            {playlistItems}
          </tbody>
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
        <div className="action-button" onClick={item.action}>{item.text}</div>
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
		if (this.props.owned == "true"){
			return(
				<div className="NQ-queue-item">
					<div onClick={() => {showQueue(this.props.QID,this.props.title,this.props.subTitle,this.props.imgSrc)}} className="hit-box">
					  <div className="queue-image-group">
							<div className="queue-image" style={bgImg}></div>
							<div className="queue-pop">{this.props.participants} </div>
						</div>
						<div className="queue-title-group">
							<div className="queue-title">{this.props.title}</div>
							<div className="queue-subtitle">{this.props.subTitle}</div>
						</div>
					</div>
					<PopMenu options={"{[{func: function(){detQueue("+this.props.QID+",'"+this.props.Pass+"')},text: 'code', icon: 'icon-qrcode', color: '#2ebd59'},{func: function(){remQueue(" + this.props.QID + ")}, text: 'delete', icon: 'icon-trash', color: '#CA3645'}]}"} />
				</div>
			);
		}
	  else{
			return(
				<div className="NQ-queue-item">
					<div onClick={() => {showQueue(this.props.QID,this.props.title,this.props.subTitle,this.props.imgSrc)}} className="hit-box">
						<div className="queue-image-group">
							<div className="queue-image" style={bgImg}></div>
							<div className="queue-pop">{this.props.participants} </div>
						</div>
						<div className="queue-title-group">
							<div className="queue-title">{this.props.title}</div>
							<div className="queue-subtitle">{this.props.subTitle}</div>
						</div>
					</div>
					<PopMenu options={"{[{func: function(){detQueue("+this.props.QID+",'"+this.props.Pass+"')},text: 'code', icon: 'icon-qrcode', color: '#2ebd59'},{func: function(){remQueue(" + this.props.QID + ")}, text: 'leave', icon: 'icon-leave', color: '#CA3645'}]}"} />
				</div>
			);
		}
	}
});

//QUEUE LIST
//Constructs a set of queue items with title.
//REQUIRED: header<String>, queues<QueueObject>
var QueueList = React.createClass({
	render: function() {
		var queueItems = (this.props.queues[0] === undefined ? "There's nothing here yet." : eval(this.props.queues).map(function (item) {
			return(
				<QueueItem owned={this.props.owned} title={item.title} Pass={item.Pass} QID={item.QID} subTitle={item.owner + " - " + moment(item.CreatedDate).format("MMM D")} imgSrc={item.imgSrc} participants={item.participants}/>
			);
		}.bind(this)));

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

//IMAGE SEARCH
var ImageSearch = React.createClass({
	getInitialState: function() {
		return {images: []};
	},
	handleChange: function(e) {
    if( e.which == 13 ) {
        this.updateValue(e.target.value);
    }
	},
	updateValue: function(phrase) {
		$.ajax({
			url: "https://api.gettyimages.com:443/v3/search/images/creative?phrase=" + phrase,
			dataType: 'json',
			headers: {'Api-Key': "9msv26ghjyp8zg6wsazf3s57"},
			success: function(data) {
				this.setState({images: data.images});
			}.bind(this),
			error: function(xhr, status, err) {
				console.log(xhr);
				console.error("Getty Images", status, err.toString());
			}.bind(this)
		});
	},
	render: function() {
		var imageItems = eval(this.state.images).map(function (item) {
			return(
				<span>
					<input id={item.id} type="radio" name="imageSrc" value={item.display_sizes[0].uri}/>
					<label htmlFor={item.id}> <img src={item.display_sizes[0].uri}/> </label>
				</span>
			);
		});

		return (
			<div>
				<input type="search" placeholder="Photo Search" onKeyPress={this.handleChange}/>
				<div className="stripe"></div>
				<div className="image-select">
	        {imageItems}
				</div>
			</div>
		);
	}
});

//SONG SEARCH
var SongSearch = React.createClass({
	getInitialState: function() {
		return {songs: []};
	},
	updateValue: function(phrase) {
		$.ajax({
			url: " https://api.spotify.com/v1/search?type=track&q=" + phrase,
			dataType: 'json',
			crossDomain: true,
			success: function(data) {
				this.setState({songs: data.tracks.items});
			}.bind(this),
			error: function(xhr, status, err) {
				console.log(xhr);
				console.error("Track req", status, err.toString());
			}.bind(this)
		});
	},
	handleChange: function(e) {
		if( e.which == 13 ) {
				this.updateValue(e.target.value);
		}
	},
	render: function() {
		var songItems = eval(this.state.songs).map(function (item) {
			return(
				<div>
					<input id={item.id} type="checkbox" value={item.id}/>
					<label htmlFor={item.id}> <img src={item.album.images[0].url}/> <div> <div className="stitle">{item.name}</div><div className="sartist">{item.artists[0].name}</div></div></label>
				</div>
			);
		});

		return (
			<div>
				<input type="search" placeholder="Song Search" onKeyPress={this.handleChange}/>
				<div className="stripe"></div>
				<div className="song-select">
	        {songItems}
				</div>
			</div>
		);
	}
});
