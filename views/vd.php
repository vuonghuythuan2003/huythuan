<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Survey Page</title>
    <script src="../JS/testform.js"></script>
</head>

<body>

    <div class="question question1">
        <label>1. Bạn cảm thấy thế nào về tâm trạng buồn của mình gần đây?</label> <br>
        <input type="radio" name="mood1" value="0" onclick="answerQuestion(this.value)"> Không cảm thấy buồn<br>
        <input type="radio" name="mood1" value="1" onclick="answerQuestion(this.value)"> Có lúc cảm thấy chán hoặc buồn<br>
        <input type="radio" name="mood1" value="2" onclick="answerQuestion(this.value)"> Luôn cảm thấy chán hoặc buồn và khó dừng lại<br>
        <input type="radio" name="mood1" value="2" onclick="answerQuestion(this.value)"> Luôn cảm thấy buồn và bất hạnh đến mức hoàn toàn đau khổ<br>
        <input type="radio" name="mood1" value="3" onclick="answerQuestion(this.value)"> Rất buồn hoặc rất bất hạnh và khổ sở đến mức không thể chịu được<br>
    </div>

    <div class="question question2" style="display: none;">
        <label>2. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
        <input type="radio" name="mood2" value="0" onclick="answerQuestion(this.value)"> Tôi hoàn toàn không bi quan và nản lòng về tương lai.<br>
        <input type="radio" name="mood2" value="1" onclick="answerQuestion(this.value)"> Tôi cảm thấy nản lòng về tương lai hơn trước đây. <br>
        <input type="radio" name="mood2" value="2" onclick="answerQuestion(this.value)"> Tôi cảm thấy mình chẳng có gì mong đợi ở tương lai cả.<br>
        <input type="radio" name="mood2" value="2" onclick="answerQuestion(this.value)"> Tôi cảm thấy sẽ không bao giờ khắc phục được những điều phiền muộn của tôi.<br>
        <input type="radio" name="mood2" value="3" onclick="answerQuestion(this.value)"> Tôi cảm thấy tương lai tuyệt vọng và tình hình chỉ có thể tiếp tục xấu đi hoặc không thể cải thiện được.<br>
    </div>

    <div class="question question3" style="display: none;">
        <label>3. Bạn cảm thấy thế nào về bản thân và sự thất bại?</label> <br>
        <input type="radio" name="mood3" value="0" onclick="answerQuestion(this.value)"> Không cảm thấy như bị thất bại<br>
        <input type="radio" name="mood3" value="1" onclick="answerQuestion(this.value)"> Thấy mình thất bại nhiều hơn những người khác<br>
        <input type="radio" name="mood3" value="2" onclick="answerQuestion(this.value)"> Cảm thấy đã hoàn thành rất ít điều đáng giá hoặc có ý nghĩa<br>
        <input type="radio" name="mood3" value="2" onclick="answerQuestion(this.value)"> Nhìn lại cuộc đời, thấy mình đã có quá nhiều thất bại<br>
        <input type="radio" name="mood3" value="3" onclick="answerQuestion(this.value)"> Cảm thấy mình là một người hoàn toàn thất bại<br>
        <input type="radio" name="mood3" value="3" onclick="answerQuestion(this.value)"> Tự cảm thấy hoàn toàn thất bại trong vai trò của mình (bố, mẹ, chồng, vợ…)<br>
    </div>

    <div class="question question4" style="display: none;">
        <label>4. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
        <input type="radio" name="mood4" value="0" onclick="answerQuestion(this.value)"> Tôi hoàn toàn không bất mãn<br>
        <input type="radio" name="mood4" value="0" onclick="answerQuestion(this.value)"> Tôi còn thích thú với những điều mà trước đây tôi vẫn thường ưa thích<br>
        <input type="radio" name="mood4" value="1" onclick="answerQuestion(this.value)"> Tôi luôn luôn cảm thấy buồn<br>
        <input type="radio" name="mood4" value="1" onclick="answerQuestion(this.value)"> Tôi ít thấy thích những điều mà tôi vẫn thường ưa thích trước đây<br>
        <input type="radio" name="mood4" value="2" onclick="answerQuestion(this.value)"> Tôi không thõa mãn về bất kỳ cái gì nữa<br>
        <input type="radio" name="mood4" value="2" onclick="answerQuestion(this.value)"> Tôi rất ít thích thú về những điều trước đây tôi vẫn thường ưa thích<br>
        <input type="radio" name="mood4" value="3" onclick="answerQuestion(this.value)"> Tôi không còn chút thích thú nào nữa<br>
        <input type="radio" name="mood4" value="3" onclick="answerQuestion(this.value)"> Tôi không hài lòng với mọi cái<br>
    </div>

    <div class="question question5" style="display: none;">
        <label>5. Bạn cảm thấy thế nào về tội lỗi của mình?</label> <br>
        <input type="radio" name="mood5" value="0" onclick="answerQuestion(this.value)"> Tôi hoàn toàn không cảm thấy có tội lỗi gì ghê gớm cả.<br>
        <input type="radio" name="mood5" value="1" onclick="answerQuestion(this.value)"> Phần nhiều những việc tôi đã làm tôi đều cảm thấy có tội.<br>
        <input type="radio" name="mood5" value="1" onclick="answerQuestion(this.value)"> Phần lớn thời gian tôi cảm thấy mình tồi hoặc không xứng đáng.<br>
        <input type="radio" name="mood5" value="2" onclick="answerQuestion(this.value)"> Tôi cảm thấy mình hoàn toàn có tội.<br>
        <input type="radio" name="mood5" value="2" onclick="answerQuestion(this.value)"> Giờ đây tôi luôn cảm thấy trên thực tế mình tồi hoặc không xứng đáng.<br>
        <input type="radio" name="mood5" value="3" onclick="answerQuestion(this.value)"> Lúc nào tôi cũng cảm thấy mình có tội.<br>
        <input type="radio" name="mood5" value="3" onclick="answerQuestion(this.value)"> Tôi cảm thấy như là tôi rất tồi hoặc vô dụng.<br>
    </div>

    <div class="question question6" style="display: none;">
        <label>6. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
        <input type="radio" name="mood6" value="0" onclick="answerQuestion(this.value)"> Tôi không cảm thấy đang bị trừng phạt.<br>
        <input type="radio" name="mood6" value="1" onclick="answerQuestion(this.value)"> Tôi cảm thấy có thể mình sẽ bị trừng phạt.<br>
        <input type="radio" name="mood6" value="1" onclick="answerQuestion(this.value)"> Tôi cảm thấy một cái gì xấu có thể đến với tôi.<br>
        <input type="radio" name="mood6" value="2" onclick="answerQuestion(this.value)"> Tôi mong chờ bị trừng phạt.<br>
        <input type="radio" name="mood6" value="2" onclick="answerQuestion(this.value)"> Tôi cảm thấy mình sẽ bị trừng phạt.<br>
        <input type="radio" name="mood6" value="3" onclick="answerQuestion(this.value)"> Tôi cảm thấy mình đang bị trừng phạt.<br>
        <input type="radio" name="mood6" value="3" onclick="answerQuestion(this.value)"> Tôi muốn bị trừng phạt.<br>
    </div>

    <div class="question question7" style="display: none;">
        <label>7. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
        <input type="radio" name="mood7" value="0" onclick="answerQuestion(this.value)"> Tôi thấy bản thân mình vẫn như trước kia hoặc tôi không cảm thấy thất vọng với bản thân.<br>
        <input type="radio" name="mood7" value="1" onclick="answerQuestion(this.value)"> Tôi thất vọng với bản thân, tôi không còn tin tưởng vào bản thân hoặc tôi không thích bản thân.<br>
        <input type="radio" name="mood7" value="2" onclick="answerQuestion(this.value)"> Tôi thất vọng với bản thân hoặc Tôi ghê tởm bản thân.<br>
        <input type="radio" name="mood7" value="3" onclick="answerQuestion(this.value)"> Tôi ghét bản thân mình hoặc Tôi căm thù bản thân.<br>
    </div>

    <div class="question question8" style="display: none;">
        <label>8. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
        <input type="radio" name="mood8" value="0" onclick="answerQuestion(this.value)"> Tôi không phê phán hoặc đổ lỗi cho bản thân hơn trước kia.<br>
        <input type="radio" name="mood8" value="0" onclick="answerQuestion(this.value)"> Tôi không tự cảm thấy một chút nào xấu hơn bất kể ai.<br>
        <input type="radio" name="mood8" value="1" onclick="answerQuestion(this.value)"> Tôi phê phán bản thân mình nhiều hơn trước kia.<br>
        <input type="radio" name="mood8" value="1" onclick="answerQuestion(this.value)"> Tôi tự chê mình về sự yếu đuối và lỗi lầm của bản thân.<br>
        <input type="radio" name="mood8" value="2" onclick="answerQuestion(this.value)"> Tôi phê phán bản thân về tất cả những lỗi lầm của mình.<br>
        <input type="radio" name="mood8" value="2" onclick="answerQuestion(this.value)"> Tôi khiển trách mình vì những lỗi lầm của bản thân.<br>
        <input type="radio" name="mood8" value="3" onclick="answerQuestion(this.value)"> Tôi đổ lỗi cho bản thân về tất cả mọi điều tồi tệ xảy ra.<br>
        <input type="radio" name="mood8" value="3" onclick="answerQuestion(this.value)"> Tôi khiển trách mình về mọi điều xấu xảy đến.<br>
    </div>

    <div class="question question9" style="display: none;">
        <label>9. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
        <input type="radio" name="mood9" value="0" onclick="answerQuestion(this.value)"> Tôi không có ý nghĩ tự sát.<br>
        <input type="radio" name="mood9" value="0" onclick="answerQuestion(this.value)"> Tôi không có bất kỳ ý nghĩ gì làm tổn hại bản thân.<br>
        <input type="radio" name="mood9" value="1" onclick="answerQuestion(this.value)"> Tôi có ý nghĩ tự sát nhưng không thực hiện.<br>
        <input type="radio" name="mood9" value="1" onclick="answerQuestion(this.value)"> Tôi có những ý nghĩ làm tổn hại bản thân nhưng tôi thường không thực hiện chúng.<br>
        <input type="radio" name="mood9" value="2" onclick="answerQuestion(this.value)"> Tôi muốn tự sát.<br>
        <input type="radio" name="mood9" value="2" onclick="answerQuestion(this.value)"> Tôi cảm thấy giá mà tôi chết thì tốt hơn.<br>
        <input type="radio" name="mood9" value="2" onclick="answerQuestion(this.value)"> Tôi cảm thấy gia đình tôi sẽ tốt hơn nếu tôi chết.<br>
        <input type="radio" name="mood9" value="3" onclick="answerQuestion(this.value)"> Tôi có dự định rõ ràng để tự sát.<br>
        <input type="radio" name="mood9" value="3" onclick="answerQuestion(this.value)"> Nếu có cơ hội tôi sẽ tự sát.<br>
    </div>

    <div class="question question10" style="display: none;">
        <label>10. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
        <input type="radio" name="mood10" value="0" onclick="answerQuestion(this.value)"> Tôi không khóc nhiều hơn trước kia.<br>
        <input type="radio" name="mood10" value="1" onclick="answerQuestion(this.value)"> Hiện nay tôi hay khóc nhiều hơn trước.<br>
        <input type="radio" name="mood10" value="2" onclick="answerQuestion(this.value)"> Tôi thường khóc vì những điều nhỏ nhặt.<br>
        <input type="radio" name="mood10" value="2" onclick="answerQuestion(this.value)"> Hiện tại tôi luôn luôn khóc, tôi không thể dừng được.<br>
        <input type="radio" name="mood10" value="3" onclick="answerQuestion(this.value)"> Tôi thấy muốn khóc nhưng không thể khóc được.<br>
        <input type="radio" name="mood10" value="3" onclick="answerQuestion(this.value)"> Trước đây thỉnh thoảng tôi vẫn khóc, nhưng hiện tại tôi không thể khóc được chút nào mặc dù tôi muốn khóc.<br>
    </div>

    <div class="question question11" style="display: none;">
        <label>11. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
        <input type="radio" name="mood11" value="0" onclick="answerQuestion(this.value)"> Tôi không dễ bồn chồn và căng thẳng hơn thường lệ.<br>
        <input type="radio" name="mood11" value="0" onclick="answerQuestion(this.value)"> Hiện nay tôi không dễ bị kích thích hơn trước.<br>
        <input type="radio" name="mood11" value="1" onclick="answerQuestion(this.value)"> Tôi cảm thấy dễ bồn chồn và căng thẳng hơn thường lệ.<br>
        <input type="radio" name="mood11" value="1" onclick="answerQuestion(this.value)"> Tôi bực mình hoặc phát cáu dễ dàng hơn trước.<br>
        <input type="radio" name="mood11" value="2" onclick="answerQuestion(this.value)"> Tôi cảm thấy bồn chồn và căng thẳng đến mức khó có thể ngồi yên được.<br>
        <input type="radio" name="mood11" value="2" onclick="answerQuestion(this.value)"> Tôi luôn luôn cảm thấy dễ phát cáu.<br>
        <input type="radio" name="mood11" value="3" onclick="answerQuestion(this.value)"> Tôi thấy rất bồn chồn và kích động đến mức phải đi lại liên tục hoặc làm việc gì đó.<br>
    </div>

    <div class="question question12" style="display: none;">
        <label>12. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
        <input type="radio" name="mood12" value="0" onclick="answerQuestion(this.value)"> Tôi không mất sự quan tâm đến những người xung quanh hoặc các hoạt động khác.<br>
        <input type="radio" name="mood12" value="1" onclick="answerQuestion(this.value)"> Tôi ít quan tâm đến mọi người, mọi việc xung quanh hơn trước.<br>
        <input type="radio" name="mood12" value="2" onclick="answerQuestion(this.value)"> Tôi mất hầu hết sự quan tâm đến mọi người, mọi việc xung quanh và ít có cảm tình với họ.<br>
        <input type="radio" name="mood12" value="3" onclick="answerQuestion(this.value)"> Tôi không còn quan tâm đến bất kỳ điều gì nữa.<br>
        <input type="radio" name="mood12" value="3" onclick="answerQuestion(this.value)"> Tôi hoàn toàn không còn quan tâm đến người khác và không cần đến họ chút nào.<br>
    </div>

    <div class="question question13" style="display: none;">
        <label>13. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
        <input type="radio" name="mood13" value="0" onclick="answerQuestion(this.value)"> Tôi quyết định mọi việc cũng tốt như trước.<br>
        <input type="radio" name="mood13" value="1" onclick="answerQuestion(this.value)"> Tôi thấy khó quyết định mọi việc hơn trước.<br>
        <input type="radio" name="mood13" value="2" onclick="answerQuestion(this.value)"> Tôi thấy khó quyết định mọi việc hơn trước rất nhiều.<br>
        <input type="radio" name="mood13" value="3" onclick="answerQuestion(this.value)"> Không có sự giúp đỡ, tôi không thể quyết định gì được nữa.<br>
        <input type="radio" name="mood13" value="3" onclick="answerQuestion(this.value)"> Tôi chẳng còn có thể quyết định được việc gì nữa.<br>
    </div>

    <div class="question question14" style="display: none;">
        <label>14. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
        <input type="radio" name="mood14" value="0" onclick="answerQuestion(this.value)"> Tôi không cảm thấy mình là người vô dụng.<br>
        <input type="radio" name="mood14" value="0" onclick="answerQuestion(this.value)"> Tôi không cảm thấy tôi xấu hơn trước chút nào.<br>
        <input type="radio" name="mood14" value="1" onclick="answerQuestion(this.value)"> Tôi không cho rằng mình có giá trị và có ích như trước kia.<br>
        <input type="radio" name="mood14" value="1" onclick="answerQuestion(this.value)"> Tôi buồn phiền là tôi trông như già hoặc không hấp dẫn.<br>
        <input type="radio" name="mood14" value="2" onclick="answerQuestion(this.value)"> Tôi cảm thấy mình vô dụng hơn so với những người xung quanh.<br>
        <input type="radio" name="mood14" value="2" onclick="answerQuestion(this.value)"> Tôi cảm thấy có những thay đổi trong diện mạo làm cho tôi có vẻ không hấp dẫn.<br>
        <input type="radio" name="mood14" value="3" onclick="answerQuestion(this.value)"> Tôi thấy mình là người hoàn toàn vô dụng.<br>
        <input type="radio" name="mood14" value="3" onclick="answerQuestion(this.value)"> Tôi cảm thấy tôi có vẻ xấu xí hoặc ghê tởm.<br>
    </div>


    <div class="question question15" style="display: none;">
        <label>15. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
        <input type="radio" name="mood15" value="0" onclick="answerQuestion(this.value)"> Tôi thấy mình vẫn tràn đầy sức lực như trước đây.<br>
        <input type="radio" name="mood15" value="1" onclick="answerQuestion(this.value)"> Sức lực của tôi kém hơn trước hoặc tôi không làm việc tốt như trước.<br>
        <input type="radio" name="mood15" value="1" onclick="answerQuestion(this.value)"> Tôi phải cố gắng để có thể khơỉ động làm một việc gì.<br>
        <input type="radio" name="mood15" value="2" onclick="answerQuestion(this.value)"> Tôi không đủ sức lực để làm được nhiều việc nữa.<br>
        <input type="radio" name="mood15" value="2" onclick="answerQuestion(this.value)"> Tôi phải cố gắng hết sức để làm một việc gì.<br>
        <input type="radio" name="mood15" value="3" onclick="answerQuestion(this.value)"> Tôi không đủ sức lực để làm được bất cứ việc gì nữa.<br>
        <input type="radio" name="mood15" value="3" onclick="answerQuestion(this.value)"> Tôi hoàn toàn không thể làm một việc gì cả.<br>
    </div>

    <div class="question question16" style="display: none;">
        <label>16. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
        <input type="radio" name="mood16" value="0" onclick="answerQuestion(this.value)"> Không thấy có chút thay đổi gì trong giấc ngủ của tôi.<br>
        <input type="radio" name="mood16" value="1" onclick="answerQuestion(this.value)"> Tôi ngủ hơi nhiều hơn trước.<br>
        <input type="radio" name="mood16" value="1" onclick="answerQuestion(this.value)"> Tôi ngủ hơi ít hơn trước.<br>
        <input type="radio" name="mood16" value="2" onclick="answerQuestion(this.value)"> Tôi ngủ nhiều hơn trước.<br>
        <input type="radio" name="mood16" value="2" onclick="answerQuestion(this.value)"> Tôi ngủ ít hơn trước.<br>
        <input type="radio" name="mood16" value="3" onclick="answerQuestion(this.value)"> Tôi ngủ hầu như suốt cả ngày.<br>
        <input type="radio" name="mood16" value="3" onclick="answerQuestion(this.value)"> Tôi thức dậy 1 - 2 giờ sớm hơn trước và không thể ngủ lại được.<br>
    </div>

    <div class="question question17" style="display: none;">
        <label>17. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
        <input type="radio" name="mood17" value="0" onclick="answerQuestion(this.value)"> Tôi không dễ cáu kỉnh và bực bội hơn trước.<br>
        <input type="radio" name="mood17" value="0" onclick="answerQuestion(this.value)"> Tôi làm việc không mệt hơn trước một chút nào.<br>
        <input type="radio" name="mood17" value="1" onclick="answerQuestion(this.value)"> Tôi dễ cáu kỉnh và bực bội hơn trước.<br>
        <input type="radio" name="mood17" value="1" onclick="answerQuestion(this.value)"> Tôi làm việc dễ mệt hơn trước.<br>
        <input type="radio" name="mood17" value="2" onclick="answerQuestion(this.value)"> Tôi dễ cáu kỉnh và bực bội hơn trước rất nhiều.<br>
        <input type="radio" name="mood17" value="2" onclick="answerQuestion(this.value)"> Làm bất cứ việc gì tôi cũng mệt.<br>
        <input type="radio" name="mood17" value="3" onclick="answerQuestion(this.value)"> Lúc nào tôi cũng dễ cáu kỉnh và bực bội.<br>
        <input type="radio" name="mood17" value="3" onclick="answerQuestion(this.value)"> Làm bất cứ việc gì tôi cũng quá mệt.<br>
    </div>

    <div class="question question18" style="display: none;">
        <label>18. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
        <input type="radio" name="mood18" value="0" onclick="answerQuestion(this.value)"> Tôi ăn vẫn ngon miệng như trước.<br>
        <input type="radio" name="mood18" value="1" onclick="answerQuestion(this.value)"> Tôi ăn kém ngon miệng hơn trước.<br>
        <input type="radio" name="mood18" value="1" onclick="answerQuestion(this.value)"> Tôi ăn ngon miệng hơn trước.<br>
        <input type="radio" name="mood18" value="2" onclick="answerQuestion(this.value)"> Tôi ăn kém ngon miệng hơn trước rất nhiều.<br>
        <input type="radio" name="mood18" value="2" onclick="answerQuestion(this.value)"> Tôi ăn ngon miệng hơn trước rất nhiều.<br>
        <input type="radio" name="mood18" value="3" onclick="answerQuestion(this.value)"> Tôi không thấy ngon miệng một chút nào cả.<br>
        <input type="radio" name="mood18" value="3" onclick="answerQuestion(this.value)"> Lúc nào tôi cũng thấy thèm ăn.<br>
    </div>

    <div class="question question19" style="display: none;">
        <label>19. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
        <input type="radio" name="mood19" value="0" onclick="answerQuestion(this.value)"> Tôi có thể tập trung chú ý tốt như trước.<br>
        <input type="radio" name="mood19" value="0" onclick="answerQuestion(this.value)"> Gần đây tôi không sút cân chút nào.<br>
        <input type="radio" name="mood19" value="1" onclick="answerQuestion(this.value)"> Tôi không thể tập trung chú ý được như trước.<br>
        <input type="radio" name="mood19" value="1" onclick="answerQuestion(this.value)"> Tôi bị sút cân trên 2 Kg.<br>
        <input type="radio" name="mood19" value="2" onclick="answerQuestion(this.value)"> Tôi thấy khó tập trung chú ý lâu được vào bất kỳ điều gì.<br>
        <input type="radio" name="mood19" value="2" onclick="answerQuestion(this.value)"> Tôi bị sút cân trên 4 kg.<br>
        <input type="radio" name="mood19" value="3" onclick="answerQuestion(this.value)"> Tôi thấy mình không thể tập trung chú ý được vào bất kỳ điều gì nữa.<br>
        <input type="radio" name="mood19" value="3" onclick="answerQuestion(this.value)"> Tôi bị sút cân trên 6 kg.<br>
    </div>

    <div class="question question20" style="display: none;">
        <label>20. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
        <input type="radio" name="mood20" value="0" onclick="answerQuestion(this.value)"> Tôi không mệt mỏi hơn trước.<br>
        <input type="radio" name="mood20" value="0" onclick="answerQuestion(this.value)"> Tôi không lo lắng về sức khỏe hơn trước.<br>
        <input type="radio" name="mood20" value="1" onclick="answerQuestion(this.value)"> Tôi dễ mệt mỏi hơn trước.<br>
        <input type="radio" name="mood20" value="1" onclick="answerQuestion(this.value)"> Tôi có lo lắng về những đau đớn hoặc những khó chịu ở dạ dày hoặc táo bón và những cảm giác của cơ thể.<br>
        <input type="radio" name="mood20" value="2" onclick="answerQuestion(this.value)"> Hầu như làm bất kỳ việc gì tôi cũng thấy mệt mỏi.<br>
        <input type="radio" name="mood20" value="2" onclick="answerQuestion(this.value)"> Tôi quá lo lắng về sức khỏe của tôi, tôi cảm thấy thế nào và điều gì đó đến nổi tôi rất khó suy nghĩ gì thêm nữa.<br>
        <input type="radio" name="mood20" value="3" onclick="answerQuestion(this.value)"> Tôi quá mệt mỏi khi làm bất kỳ việc gì.<br>
        <input type="radio" name="mood20" value="3" onclick="answerQuestion(this.value)"> Tôi hoàn toàn bị thu hút vào những cảm giác của tôi.<br>
    </div>

    <div class="question question21" style="display: none;">
        <label>21. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
        <input type="radio" name="mood21" value="0" onclick="answerQuestion(this.value)"> Tôi không thấy có thay đổi gì trong hứng thú tình dục.<br>
        <input type="radio" name="mood21" value="1" onclick="answerQuestion(this.value)"> Tôi ít hứng thú với tình dục hơn trước.<br>
        <input type="radio" name="mood21" value="2" onclick="answerQuestion(this.value)"> Hiện nay tôi rất ít hứng thú với tình dục.<br>
        <input type="radio" name="mood21" value="3" onclick="answerQuestion(this.value)"> Tôi hoàn toàn mất hứng thú tình dục.<br>
    </div>

    <div class="completion" style="display: none;">
        <p id="completionMessage"></p>
    </div>

    <!-- Nút "Tiếp tục" và "Hoàn thành" -->
    <button id="nextButton" onclick="continueToNextQuestion()">Tiếp tục</button>
    <button id="completeButton" onclick="completeSurvey()" style="display: none;">Hoàn thành</button>

</body>

</html>

<!-- Đoạn mã JavaScript -->
<script>
    let currentQuestionIndex = 1;
    const totalQuestions = 5; // Cập nhật tổng số câu hỏi

    function answerQuestion(value) {
        // Các logic xử lý câu trả lời câu hỏi
    }

    function continueToNextQuestion() {
        const radioButtons = document.querySelectorAll(`.question${currentQuestionIndex} input[type="radio"]:checked`);
        if (radioButtons.length === 0) {
            alert('Vui lòng chọn một phương án trước khi tiếp tục.');
            return;
        }

        if (currentQuestionIndex === totalQuestions) {
            document.getElementById('completeButton').style.display = 'block';
            document.getElementById('nextButton').style.display = 'none';
        } else {
            document.querySelector(`.question${currentQuestionIndex}`).style.display = 'none';
            currentQuestionIndex++;
            document.querySelector(`.question${currentQuestionIndex}`).style.display = 'block';
            document.getElementById('backButton').style.display = 'block';
            // Hiển thị nút "Hoàn thành" khi ở câu hỏi cuối cùng
            if (currentQuestionIndex === totalQuestions) {
                document.getElementById('nextButton').style.display = 'none';
                document.getElementById('completeButton').style.display = 'block';
            }
        }
    }

    function goBackToPreviousQuestion() {
        if (currentQuestionIndex > 1) {
            document.querySelector(`.question${currentQuestionIndex}`).style.display = 'none';
            currentQuestionIndex--;
            document.querySelector(`.question${currentQuestionIndex}`).style.display = 'block';
            if (currentQuestionIndex === 1) {
                document.getElementById('backButton').style.display = 'none';
            }
            if (currentQuestionIndex < totalQuestions) {
                document.getElementById('nextButton').style.display = 'block';
                document.getElementById('completeButton').style.display = 'none';
            }
        }
    }

    function completeSurvey() {
        var totalScore = calculateTotalScore();
        document.getElementById('userScoreDisplay').innerText = totalScore;
        document.querySelector('.question').style.display = 'none';
        document.querySelector('.completion').style.display = 'block';
        // Hiển thị nút "Quay lại" và "Hoàn thành" khi hoàn thành khảo sát
        document.getElementById('backButton').style.display = 'block';
        document.getElementById('completeButton').style.display = 'block';
        sendScoreToServer(totalScore);
    }

    function calculateTotalScore() {
        var totalScore = 0;
        var radioButtons = document.querySelectorAll('input[type=radio]:checked');
        radioButtons.forEach(function(radioButton) {
            totalScore += parseInt(radioButton.value);
        });
        return totalScore;
    }

    function sendScoreToServer(score) {
        var form = document.createElement('form');
        form.method = 'post';
        form.action = '../ADMIN/connect.php';
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'user_score';
        input.value = score;
        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    }
</script>