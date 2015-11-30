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
          <td>{item.track.name}</td>
          <td>{item.track.artists[0].name}</td>
          <td>{Math.floor((item.track.duration_ms / 1000) / 60) + ":" + ("00" + Math.floor((item.track.duration_ms / 1000) % 60)).substr(-2,2)}</td>
          <td><i className="icon-dots"></i></td>
          </tr>
        );
      });

      return (
        <table className="u-full-width playlist">
          <thead>
            <tr>
              <th>Track</th>
              <th>Artist</th>
              <th>Duration</th>
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
				<i className="icon-dots"></i>
			</div>
		)
	}

});
